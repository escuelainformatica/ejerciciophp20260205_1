<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Repo\LibroRepo;

class LibroController extends Controller
{
    public function listar() {
        $libros=LibroRepo::listar();
        return view("libro.listar",['libros'=>$libros]);

    }
    public function agregar() {
        $libro=new Libro();
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'']);
    }
    public function agregarPost(Request $request) {
        $libro=new Libro($request->all());
        LibroRepo::insertar($libro);
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'libro insertado']);
    }
    public function modificar($id) {
        $libro=LibroRepo::obtener($id);
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'']);
    }

    public function modificarPost($id,Request $request) {
        $libro=new Libro($request->all());
        
        $libro->id=$id;
        LibroRepo::actualizar($libro);
        return view("libro.formulario",['libro'=>$libro,'mensaje'=>'actualizado correctamente']);
    }
}
