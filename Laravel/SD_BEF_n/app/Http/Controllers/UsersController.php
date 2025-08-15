<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function createUsers() {
        return view('users.add_users');
    }

    public function allUsers() {
        $users = ['João', 'Maria', 'Pedro', 'Joana'];
        $users = $this->getUsers();

        // ir de de forma real à base de dados
        $usersFromDB = $this->getUsersFromDB();

        $courseResp = User::where('id', 5)
                        ->select('name', 'email')
                        ->first();
 
        //dd($courseResp);

        //dd($users);
        return view('users.all_users', compact(
            'users', 
            'usersFromDB', 
            'courseResp'));
    }

    // query de insert, no futuro os dados a inserir vem do formulário
    public function testSqlQueries(){
        /*
        DB::table('users')
        ->insert([
            'name' => 'Pedro',
            'email' => 'pedro@email.com',
            'password' => '67568568'
        ]);
        
    
        DB::table('users')
        ->where('id', 3)
        ->update([
            'name' => 'Rita',
            'address'=> 'Rua da Rita',
            'updated_at' => now()
        ]);
        

        DB::table('users')->updateOrInsert(
        [
            'email'=>'barbara@email.com',
        ],
        [
            'name'=> 'Bárbara',
            'email'=>'barbara@email.com',
            'address'=>'Rua da Bárbara',
            'password'=>'1213454534',
            'updated_at' => now(),
        ]);
        

        DB::table('users')
        ->where('id', 3)
        ->delete();


        return response()->json('query ok!');
        */
    }  
    
    //função que retorna a view de um user (O que estamos a clicar)
    public function viewUser($id){
        $myUser = User::where('id', $id)->first();

        return view('users.show_user', compact('myUser'));
    }
    
    public function deleteUser($id){
        Task::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back();
    }

    public function storeUser(Request $request){
        $request->validate([
                'name' => 'string|max:50|required',
                'email' => 'required|unique:users|email'
            ]);

         User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);  

        return redirect()->route('all_users_route')->with('message', 'Contato adicionado com sucesso.');
        //dd($request->all());
    }

    public function updateUser(Request $request){
        //dd($request->all());
 
        $request->validate([
            'name' => 'required'
        ]);
 
        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'nif'=> $request->nif,
            'address'=> $request->address,
        ]);
 
        return redirect()->route('all_users_route')->with('message', 'Utilizador actualizado com sucesso!');
 
    }

    // GETTERS
    private function getUsers() {
        // simula ir à base de dados carregar todos os users
        $users = [
            ['id' => 1, 'name' => 'Rita', 'phone' => '23562454'],
            ['id' => 2, 'name' => 'João', 'phone' => '2476768'],
            ['id' => 3, 'name' => 'Pedro', 'phone' => '24637634']
        ];

        return $users;
    }

    
    private function getUsersFromDB(){
        // Query real que vai à base de dados buscar todos os users;
        
        $users = User::get();

        //dd($users);
        return $users;
    }
}

