<?php namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Todo;
use Request;
 
class TodosController extends Controller {
 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
 
        $todos = Todo::all();

        return $todos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $title = Request::get('title');
        $todo = Todo::create(['title' => $title, 'done' => 0]);

        return Array('message' => 'Task added!  '.$title);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $todo = Todo::find($id);
        $todo->done = Request::input('done');
        $todo->save();

        return Array('message' => 'Task status updated.');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Todo::destroy($id);

        return Array('message' => 'Task deleted!');
    }
 
}
?>