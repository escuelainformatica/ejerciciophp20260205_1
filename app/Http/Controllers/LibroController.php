<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Libro;
use App\Repo\LibroRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LibroPostRequest;
use Illuminate\Validation\ValidationException;

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

    public function login(Request $request) {
        $usuario=new User($request->old());
        return view("login",['usuario'=>$usuario,'mensaje'=>'']);
    }
    public function loginPost(Request $request) {
        $usuario = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($usuario, $request->boolean('remember'))) { // , $request->boolean('remember')
            $request->session()->regenerate();

            return redirect()->intended('/libro'); // Redirects to the intended URL or the home page
        }
        $usuario=new User($usuario);
        // Si el usuario es valido, debo fijar la sesion y redireccion a cualquier otra pagina.
        return view("login",['usuario'=>$usuario,'mensaje'=>'usuario o clave no valido']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user by clearing their session
        $request->session()->invalidate(); // Invalidates all session data
        $request->session()->regenerateToken(); // Regenerates the CSRF token for security
        return redirect('/login'); // Redirects the user to the login page
    }
}
