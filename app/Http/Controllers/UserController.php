<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Switches;


class UserController extends Controller
{
    public function register(switches $switches)
    {
        return view('auth/register')->with(['switches'=> $switches->get()]);
    }
}
