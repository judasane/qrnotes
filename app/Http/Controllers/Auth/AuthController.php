<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar) {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getIndex() {
        return redirect("auth/login");
    }

    public function postRegister(Request $request) {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                    $request, $validator
            );
        }

        $user = $this->registrar->create($request->all());

        return "Se ha enviado un correo de verificación a $user->email";
    }

    public function getVerificar(Request $request) {

        $code = $request->input("code");
        if ($code == NULL || strlen($code) != 30) {
            return "Has llegado acá por error";
        } else {

            $user = \App\User::where("password", $code)->first();
            if ($user == null) {
                return "Aleja tus manitas creativas de nosotros";
            } else {
                return view("auth.verificado", ["nombre" => $user->nombre, "id" => $user->id]);
            }
        }
    }

    /**
     * Requiere id y password por post
     * @param Request $request
     */
    public function postVerificar(Request $request) {
        $validator = $this->validatorPass($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                    $request, $validator
            );
        }
        $user = \App\User::where("id", $request->input("id"))->first();
        $password = $request->input("password");
        $user->password = bcrypt($password);
        $user->save();
        $this->auth->login($user);
        return redirect($this->redirectPath());
    }

    public function validatorPass(array $data) {
        return \Validator::make($data, [
                    'password' => 'required|confirmed|min:6'
        ]);
    }

}
