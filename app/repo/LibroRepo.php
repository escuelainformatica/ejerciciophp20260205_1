<?php

namespace App\Repo;
use App\Models\Libro;

class LibroRepo {
public static function listar() { // LibroRepo::listar()
        $libros=Libro::all();
        return $libros;
    }
    public static function insertar(Libro $libro):bool {
        $libro->save();
        return true;
    }
    public static function actualizar(Libro $libro):bool {
        $libroDesdeBase=Libro::find($libro->id); // <-- marcado para actualizar
        $libroDesdeBase->Titulo=$libro->Titulo;
        $libroDesdeBase->Autor=$libro->Autor;
        $libroDesdeBase->NumPaginas=$libro->NumPaginas;
        $libroDesdeBase->Precio=$libro->Precio;
        $libroDesdeBase->save();
        return true;
    }
    public static function eliminar(int $id):bool {
        Libro::destroy($id);
        return true;
    }
    public static function obtener(int $id):Libro {
        $libro = Libro::find($id);
        return $libro;
    }
}