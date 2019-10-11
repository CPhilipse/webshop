<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Show Admin Dashboard.
     *
     * @return Response
     */
    public function index(){
        return view('admin.home');
    }
}
