<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BatallaController extends Controller
{
    public function index(){
        return View('Batallas.index');
    }
}