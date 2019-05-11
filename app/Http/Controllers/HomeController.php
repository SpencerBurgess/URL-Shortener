<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Redirect user to requested location.
     *
     * @param  int  $id
     * @return View
     */
    public function redirect($shrt)
    {
        // return
    }
}
