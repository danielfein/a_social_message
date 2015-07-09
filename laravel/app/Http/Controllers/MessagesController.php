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
      $user = Auth::user();
      return view('messages.send');
    }

    public function messageSend(){
      $user = Auth::user();
      //Need to receive input and send it


//      return view('sendMessage');
    }

}
