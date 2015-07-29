<?php namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Todo;
use Request;
 
class TodoAppController extends Controller {
 
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('index');
    }
 
}
?>