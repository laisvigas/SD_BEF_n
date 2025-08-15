<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UtilController::class, 'index'])->name('home_route');


// users
// rota que nos vai enviar os users
Route::get('/add_users', [UsersController::class, 'createUsers'])->name('users_route');
Route::post('/store-user', [UsersController::class, 'storeUser'])->name('users.store');
Route::get('/all_users', [UsersController::class, 'allUsers'])->name('all_users_route');
//rota que pega nos dados do formulário para fazer um update
Route::put('/update-user', [UsersController::class, 'updateUser'])->name('users.update');

Route::get('/test-queries', [UsersController::class, 'testSqlQueries'])->name('test_sql_name');
Route::get('/view-user/{id}', [UsersController::class, 'viewUser'])->name('user.show');
Route::get('/delete-user/{id}', [UsersController::class, 'deleteUser'])->name('user.delete');

//______________________________________________________________________________________________

// BOOKS
Route::get('/books', [BooksController::class, 'index'])->name('books_route');

// criar/editar
Route::get('/books/create', [BooksController::class, 'create'])->name('books_create');
Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books_edit');

// gravar/atualizar/apagar
Route::post('/books', [BooksController::class, 'store'])->name('books_store');
Route::put('/books/{book}', [BooksController::class, 'update'])->name('books_update');
Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books_destroy');

//______________________________________________________________________________________________

//hello
Route::get('/hello', [UtilController::class, 'hello'])->name('hello_route_name');

//______________________________________________________________________________________________

//tasks
Route::get('/add_tasks', [TaskController::class, 'createTask'])->name('tasks_route');
Route::post('/store-task', [TaskController::class, 'storeTask'])->name('tasks.store');
Route::get('/all_tasks', [TaskController::class, 'allTasks'])->name('all_tasks_route');
Route::get('/view-task/{id}', [TaskController::class, 'viewTask'])->name('task.show');
Route::get('/delete-task/{id}', [TaskController::class, 'deleteTask'])->name('task.delete');

//______________________________________________________________________________________________

Route::get('/curso/{nomeDoCurso}', function($nomeDoCurso){
    return '<h2>Curso de '.$nomeDoCurso.'</h2>';
});

Route::get('/modules/{name}', function($name){
    return '<h1>Este é o módulo de: '.$name.'</h1>';
});

Route::fallback(function(){
    return view('utils.fallback');
})->name('fallback_route');