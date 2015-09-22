<?php

namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {
    private $data=[];
    private $confirmation_code="";
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data) {
        return Validator::make($data, [
                    'nombre' => 'required|max:255',
                    'apellido' => 'required|max:255',
                    'genero' => 'required|in:masculino,femenino',
                    'email' => 'required|email|max:255|unique:users',
                    'carrera' => 'required|max:255',
//                    'password' => 'required|confirmed|min:6',
                    'nacimiento'=>'required|date',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data) {
        $this->data=$data;
        $this->confirmation_code = str_random(30);
        $user= User::create([
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'genero' => $data['genero'],
                    'email' => $data['email'],
                    'carrera' => $data['carrera'],
                    'nacimiento' => $data['nacimiento'],
                    'password' => $this->confirmation_code,
        ]);
        
        \Mail::send("emails.verify",["nombre"=>$this->data["nombre"],"confirmation_code"=>$this->confirmation_code],function($message){
        $message->to($this->data["email"],$this->data["nombre"]." ".$this->data["apellido"])->subject("Correo de verificación"); 
        });
        
        return $user;
        
    }

}
