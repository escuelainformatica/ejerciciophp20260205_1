# Ejercicio 2026-02-10

En el proyecto anterior, agregue validacion del formulario (usando una clase de validación)



# Ejercicio 2026-02-05

Cree un proyecto para listar e insertar una Compañia

La compañia (Compania) tiene los siguientes campos:

* Id
* Nombre
* Direccion

Use el siguiente ejemplo de guia:



# Pasos

* SRP Responsabilidad de principio simple.

## Crear el proyecto

- [x] Crear el proyecto



## Crear los modelos.

- [x] Libro
  - [x] ID
  - [x] Titulo
  - [x] Autor
  - [x] NumPaginas
  - [x] Precio

```bash
php artisan make:model Libro
```



## (opcional) factory

````
php artisan make:factory LibroFactory
````

- [x] crear el factory
- [x] implementarlo

## (opcional) seeder

Editar el archivo seeder, indicando, por ejemplo las filas a agregar

- [x] editar el seeder existente

## migración

```bash
php artisan make:migrate tablalibro
```

- [x] Crear la migración
- [x] Agregar la operación de migración (operacion de crear tabla)
- [x] (opcional) agregar la operación de deshacer los cambios (eliminar la tabla)

## controlador (casi uno de los ultimas clases en implementar)

```bash
php artisan make:controller LibroController
```

- [x] Crear el controlador
- [x] Agregar funciones o acciones en el controlador.
  - [x] listar
  - [x] Agregar
  - [x] Modificar
- [x] En las funciones, hay que implementar el código.  Este código puede unir el modelo, servicio y vistas.



## servicio (manual)

El servicio de crea a mano. Hay que crear una carpeta y crear el archivo php con una clase a mano.

- [x] Crear el archivo LibroRepo.php
- [x] Dentro de ese archivo, crear la clase y las siguientes funciones
  - [x] Listar
  - [x] Agregar
  - [x] Modificar
  - [x] Obtener

## vistas

```bash
php artisan make:view libro.formulario
php artisan make:view libro.listar
```

- [x] Crear las vistas
  - [x] vista libro.formulario
  - [x] vista libro.listar
- [x] Implementar las vistas
  - [x] vista libro.formulario
  - [x] vista libro.listar

## editar en el enrutador

- [x] Editar el archivo route/web.php 
- [x] Y agregar rutas hacia las funciones del controlador



## Una vez creado los archivos

- [x] Correr la migración
- [x] Correr el seed para que se agreguen datos de ejemplo



# Validaciones 2026-02-10

## En el metodo get del controlador

En el metodo get, hay que leer los valores anteriores (por si hay error) con $request->old()

Ejemplo:
```php
    public function agregar(Request $request) {        
        $libro=new Libro($request->old()); // $request->old() sirve para leer los datos ingresados incorrectamente
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'']);
    }
```

## En el metodo post del controlador, hay que hacer la validacion

Para ello se usa la funcion $request->validate(). Si falla una validacion, el sistema redireccion al metodo get del controlador.

Ejemplo:
```php
    public function agregarPost(Request $request) {
        $validado=$request->validate([
                    'Titulo'=>'required|max:40',
                    'Autor'=>'required|max:50',
                    'NumPaginas'=>'integer|between:0,1000', // ese campo es entero y por lo tanto, otras comparaciones son considerando que es un numero y no un texto
                    'Precio'=>'integer|gte:0'
                    ]); // si falla la validacion, el sistema se devuelve al metodo get (agregar)

        $libro=new Libro($validado);
        // ....
    }
```
## En la vista
Para mostrar los errores de validacion, se usa la variable $error

Ejemplo:

```php
        <input type="text" name="Titulo" placeholder="Titulo" value="{{ $libro->Titulo }}"/><br/>
        @error('Titulo')
        <div style="color:red">{{ $message }}</div>
        @enderror()
```

## Para la traducción de los errores
En la linea de comando, ejecute lo siguiente:

```bash
php artisan lang:publish
```
Esto va a generar una carpeta llamada \lang\en

Puede hacer lo siguiente:
* Copiar la carpeta en y cambiarle el nombre a es (español)
* O editar los archivos de la misma carpeta.

Aqui se puede editar las traducciones:

Ejemplo, para cambiar la validacion "required'

```php
'required' => 'El campo :attribute es requerido.',
```

# Crear una validacion personalizada

En la linea de comando, se ejecuta lo siguiente

```bash
php artisan make:request LibroPostRequest
```

Se va a crear una clase en la siguiente carpeta

\app\Http\Requests\

En el archivo creado, agregue las reglas que corresponde con lo que se quiere validar

Ejemplo:
```php
    public function rules(): array
    {
        return [
                    'Titulo'=>'required|max:40',
                    'Autor'=>'required|max:50',
                    'NumPaginas'=>'integer|between:0,1000', // ese campo es entero y por lo tanto, otras comparaciones son considerando que es un numero y no un texto
                    'Precio'=>'integer|gte:0'
                ];
    }
```
Luego, en la funcion del controlador, use la clase que creo en vez de Request

Ejemplo:
```php
    public function modificarPost($id,LibroPostRequest $request) {
        $libro=new Libro($request->all());
        
        $libro->id=$id;
        LibroRepo::actualizar($libro);
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'actualizado correctamente']);
    }
```

Si falla la operacion con error 403 (autorizacion), en la clase LibroPostRequest, modifique lo siguiente

```php
    public function authorize(): bool
    {
        return true;
    }
```