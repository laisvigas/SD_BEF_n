<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    public function createTask() {
        return view('utils.add_tasks');
    }

    public function allTasks() {
        $tasksInfo = $this->getTasks();
        $tasksFromDB = $this->getTasksFromDB();

        return view('utils.all_tasks', compact('tasksInfo', 'tasksFromDB'));
    }

    public function viewTask($id){
        $myTask = Task::find($id);

        return view('utils.show_task', compact('myTask'));
    }


    public function deleteTask($id){
        Task::where('id', $id)->delete();

        return back();
    }

    public function storeTask(Request $request)
    {
        $request->validate([
            'name' => 'string|max:50|required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id' 
        ]);

        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        return redirect()->route('all_tasks_route')->with('message', 'Tarefa adicionada com sucesso.');
    }

        
    //GETTERS
    private function getTasks() {
        // simula ir à base de dados carregar todos os users
        $tasks = [
            ['name' => 'Zelda', 'task' => 'Estudar Laravel'],
            ['name' => 'Link', 'task' => 'Estudar Sql']
        ];

        return $tasks;
    }

    private function getTasksFromDB(){
        // Query real que vai à base de dados buscar todos os users;
        // $tasks = db::table('tasks')->get();

        //dd($users);
        // return $tasks;

        $tasks = Task::get();

        //dd($users);
        return $tasks;
        //dd($users);
       
    }
}
