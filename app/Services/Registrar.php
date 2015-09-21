<?php

namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

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
                    'password' => 'required|confirmed|min:6',
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
        return User::create([
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'genero' => $data['genero'],
                    'email' => $data['email'],
                    'carrera' => $data['carrera'],
                    'nacimiento' => $data['nacimiento'],
                    'password' => bcrypt($data['password']),
        ]);
    }

}
