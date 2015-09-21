<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Mail\Mailer;

class CorreoController extends Controller {

    private $email="";
    
    public function getIndex() {
        return view('correo');
    }

    public function postIndex(Request $request) {
        $this->email = $request->input('email');

        \Mail::send('emails.welcome', ['nombre' => 'Juan'], function($message) {
            $message->to($this->email, 'John Smith')->subject('Welcome!');
        });

        return "el correo se envió a  $this->email ";
    }

}
