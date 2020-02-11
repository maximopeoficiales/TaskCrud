<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //usamos este middleware para que si el usuario no se loguea lo redireccione
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /* guarda las tareas del usuario en session */
        $tasks = $request->user()->tasks()->orderBy('created_at', 'desc')->get();
        /* envia un array tasks con los datos */
        return view('tasks.index', ['tasks' => $tasks]);
    }
    public function store(Request $request)
    {
        /* dd($request); vardump de laravel */
        /* validacion de campos si hay error los guarda en $errors */
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        /* obtiene el dato de la relacion y ejecuta el query */
        $request->user()->tasks()->create([
            'title' => $request->title
        ]);
        return redirect('/tasks');
    }

    public function editView($id)
    {
        $task = Task::find($id);/* busca */
        if (empty($task)) {
            return redirect('/tasks');
        }
        $this->authorize('verify', $task);/* verifica la autorizacion */
        return view('tasks.edit', ['task' => $task]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $task = Task::find($id);/* busca */
        if (empty($task)) {
            return redirect('/tasks');
        }
        $this->authorize('verify', $task);/* verifica la autorizacion */

        $task->title = $request->title;/* guarda el dato */
        $task->save();/* sobreescribe los datos */
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $task = Task::find($id);/* busca */
        if (empty($task)) {
            return redirect('/tasks');
        }
        $this->authorize('verify', $task);/* verifica la autorizacion */
        $task->delete();/* elimina de la vd */
        return redirect('tasks');
    }
}
