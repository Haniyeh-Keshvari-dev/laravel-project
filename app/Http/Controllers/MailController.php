<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class MailController extends Controller
{
    public function index(Request $request)
    {
       return view('mail.index');
    }

}
