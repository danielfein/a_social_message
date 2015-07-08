<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      $user = Auth::user();
      print_r($user);
    }
}
