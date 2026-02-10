<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Repo\LibroRepo;
use Illuminate\Http\Request;
use App\Http\Requests\LibroPostRequest;

class LibroController extends Controller
{
    public function listar() {
        $libros=LibroRepo::listar();
        return view("libro.listar",['libros'=>$libros]);

    }
    public function agregar(Request $request) {        
        $libro=new Libro($request->old()); // $request->old() sirve para leer los datos ingresados incorrectamente
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'']);
    }
    public function agregarPost(Request $request) {
        $validado=$request->validate([
                    'Titulo'=>'required|max:40',
                    'Autor'=>'required|max:50',
                    'NumPaginas'=>'integer|between:0,1000', // ese campo es entero y por lo tanto, otras comparaciones son considerando que es un numero y no un texto
                    'Precio'=>'integer|gte:0'
                    ]); // si falla la validacion, el sistema se devuelve al metodo get (agregar)

        $libro=new Libro($validado);
        LibroRepo::insertar($libro);
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'libro insertado']);
    }
    public function modificar($id,Request $request) {        
        if(count($request->old())>0)  {
            $libro=new Libro($request->old()); // si la pagina muestra errores anteriores, entonces carga los valores desde lo que se digito
        } else {
            $libro=LibroRepo::obtener($id); // en caso contrario, muestra el libro desde la base de datos
        }
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'']);
    }

    public function modificarPost($id,LibroPostRequest $request) {
        $libro=new Libro($request->all());
        
        $libro->id=$id;
        LibroRepo::actualizar($libro);
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'actualizado correctamente']);
    }
}
