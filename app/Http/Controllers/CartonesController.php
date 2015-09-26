<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class CartonesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    // public function getNew($numero=null){
    // 	return view("app/registro_cartones");
    // }
    //   public function getHola($nombre=null,$apellido=null){
    //       return "hola $nombre, cómo $apellido esás=";
    //   }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        $packs=  Auth::user()->packs;
        return view("app.listado_packs")->withPacks($packs);
        
    }

    public function getPack($numero) {
        $numero = substr($numero, 1);
        $numero = $this->decodificar($numero);
        $pack = \App\Carton::find($numero);
        if ($pack == null) {
            return "Qué chistosito, el pack al que intentas acceder aún no se ha impreso";
        } else {
            if ($pack->user_id == 1) {
                return view("app.registro_cartones")->withNumero($numero);
            } else {
                if ($pack->user_id == Auth::user()->id) {
                    return "soy tu cartón";
                } else {
                    return "este cartón no te pertenece";
                }
            }
            return $pack->alias;
        }
    }

    public function postPack(Request $request) {
        $numero = $request->input("numero");
        $codigo = $request->input("codigo");
        $alias = $request->input("alias");
        $pack = \App\Carton::find($numero);
        $userPackCount = Auth::user()->packs()->count() + 1;
        // Condiciones: debe pertenecer al usuario id=1 (qrnotes), y debe coincidir el estado con el código de seguridad
        if ($pack->user->id == 1 && $pack->estado == $codigo) {
            $pack->estado = "activo";
            $pack->alias = "$userPackCount - $alias";
            $pack->user()->associate(Auth::user());
            $pack->save();
            return "éxito!";
        } else {
            return "fracaso";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    function codificar($id) {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortenedId = '';
        while ($id > 0) {
            $remainder = $id % 62;
            $id = ($id - $remainder) / 62;
            $shortenedId = $alphabet{$remainder} . $shortenedId;
        };
        return $shortenedId;
    }

    private function decodificar($id) {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $number = 0;
        foreach (str_split($id) as $letter) {
            $number = ($number * 62) + strpos($alphabet, $letter);
        }
        return $number;
    }

}
