<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      $user = Auth::user(); what am i missing?
      print_r($user);
    }
}