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



