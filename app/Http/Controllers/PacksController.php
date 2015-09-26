<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class PacksController extends Controller {

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
        $numero = \App\Classes\Numeracion::decodificar($numero);
        $pack = \App\Pack::find($numero);
        if ($pack == null) {
            return "Qué chistosito, el pack al que intentas acceder aún no se ha impreso";
        } else {
            if ($pack->user_id == 1) {
                return view("app.registro_cartones")->withNumero($numero);
            } else {
                if ($pack->user_id == Auth::user()->id) {
                    return view("app.pack")->withPack($pack);
                } else {
                    return "este pack no te pertenece";
                }
            }
            return $pack->alias;
        }
    }

    public function postPack(Request $request) {
        $numero = $request->input("numero");
        $codigo = $request->input("codigo");
        $alias = $request->input("alias");
        $pack = \App\Pack::find($numero);
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
     * Muestra formulario de generación de packs
     * @return Página de generación de packs
     */
    public function getGenerar(){
        if (Auth::user()->email=="judasane@gmail.com"){
            return view("app.generar");
        }else{
            return "Estás intentando hacer algo que no está bien";
        }        
    }
    
    /**
     * Genera un cartón listo para imprimir siempre que se use en chrome
     * @return Página del cartón
     */
    public function postGenerar(){
        if (Auth::user()->email=="judasane@gmail.com"){
            return view("carton");
        }else{
            return "Estás intentando hacer algo que no está bien";
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

}
