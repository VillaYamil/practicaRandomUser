<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
    
        // Verificamos si vienen varios usuarios (desde la API)
        if (isset($data[0]['name']['first'])) {
            foreach ($data as $usuario) {
                User::create([
                    'name' => $usuario['name']['first'] . ' ' . $usuario['name']['last'],
                    'email' => $usuario['email'],
                ]);
            }
            return response()->json(['message' => 'Usuarios guardados correctamente']);
        }
    
        // Si no, es un formulario común (desde /user/create)
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']); // Opcional encriptar
        $user->save();
    
        return redirect('/user')->with('success', 'Usuario creado correctamente');
    }

    public function random(){

        return view('random');
    }

    public function create(){

        return view('create');
    }

    public function show_all(){

        $users = User::all(); // Trae todos los usuarios de la BD
        return view('show_all', compact('users')); // Pasa la variable a la vista
    }

    public function buscar(Request $request)
    {

        $id = $request->query('user_id');
        $name = $request->query('name');
        $user = null;

        if ($id) {
            $user = User::find($id);
        }

        if (!$user && $name) {
            $user = User::where('name', 'LIKE', '%' . $name . '%')->first();
        }

        if (!$user) {
            return redirect('/user')->with('success', 'Usuario no encontrado');
        }

        return view('show', compact('user'));
    }

    public function edit($user){
        
        $user = User::find($user);

        return view('edit',compact('user'));
    }

    public function update(request $request, $user){

        $user = User::find($user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();

        return redirect("/user/{$user->id}");
    }

    public function destroy($user){

    // return "Eliminando el user ($user)";
        $user = User::find($user);

        user->delete();

        return redirect('/user');
    }

}