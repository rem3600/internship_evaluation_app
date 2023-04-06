<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEvaluation;

class MailController extends Controller
{
    public function sendMail() {

        $name = 'Jari Boeckstaens';
        Mail::to('fake@mail.com')->send(new SendEvaluation($name));

        return view('welcome');
    }
}
