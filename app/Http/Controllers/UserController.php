<?php

namespace App\Http\Controllers;

use App\Models\tipousuario;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    public function showlogin(){
        return view('login.iniciar');
    }
    public function verificalogin(Request $request){
        //return dd($request->all()); ver los valores enviados
        $credentials =$request->validate([
            'username'=>'required|string', 
            'password'=>'required|string'
        ],[
            'username.required'=>'Ingrese el usuario',
            'password'=>'Ingrese la contraseña'
        ]);
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                $rol=tipoUsuario::find(Auth::user()->idtipousuario);
                session(['rol' => $rol]);
                return redirect()->intended('bienvenido')->with('status','Sesión correcta');
            }
            throw ValidationException::withMessages([
                'username'=>'Usuario no encontrado',
                'password'=>'Contraseña incorrecta'
            ]);
            
        
    }
    public function salir( Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login');
           
    }

    public function index(){
        $usuarios = DB::select('SELECT u.id,u.username, t.nombre as nombre ,u.activo, tu.tipo 
                                FROM users u 
                                INNER JOIN tipousuario tu ON tu.id = u.idtipousuario 
                                INNER JOIN trabajadores t ON t.id = u.idtrabajador
                                WHERE u.activo = 1 and u.eliminado = 0');
        $tipos = DB ::select('SELECT * FROM tipousuario WHERE activo = 1 and eliminado = 0');
        $trabajadores = DB ::select('SELECT * FROM trabajadores WHERE activo = 1 and eliminado = 0');
        
        return view('usuarios.usuarios.index',compact('usuarios','tipos','trabajadores'));
    }
    public function store(Request $request){
        $user = new User();
        $trabajador = Trabajador::find($request->idtrabajador);
        $user->idtipousuario = $request->idrol;
        $user->idtrabajador = $request->idtrabajador;
        $user->username = $request->usuario;
        $user->email = $trabajador->email;
        $user->password = Hash::make($request->contrasena);
        $user->save();
        return redirect()->route('usuarios');
    }
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->activo = 0;
        $user->eliminado = 1;
        $user->save();
        return back()->with('Borrado', 'El usuario fue eliminado correctamente');
    }
}

