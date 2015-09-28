<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PacksController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Si el usuario está logueado, muestra sus packs, de lo contrario, redirige
     * al login
     * @return Vista con todos los packs del usuario
     */
    public function getIndex() {
        $packs = Auth::user()->packs;
        return view("app.listado_packs")->withPacks($packs);
    }

    /**
     * Muestra el pack. En caso de que no esté aún registrado, envía al formulario
     * de registro del mismo. En caso de que el pack sea de otro usuario, lo informa
     * y si el pack no está aún generado, también.
     * @param type $numero Número codificado en base 62, iniciando con c. ej:ca para 10
     * @return Vista
     */
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

    /**
     * Permite registrar el pack, para que sea propiedad del usuario, a la vez
     * que valida la autenticidad del mismo
     * @param Request $request
     * @return string
     */
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
     * @return Vista de generación de packs
     */
    public function getGenerar() {
        if (Auth::user()->email == "judasane@gmail.com") {
            return view("app.generar");
        } else {
            return "Estás intentando hacer algo que no está bien";
        }
    }

    /**
     * Genera un cartón listo para imprimir, siempre que se use en chrome
     * @return json con la respuesta
     */
    public function postGenerar() {
        if (Auth::user()->email == "judasane@gmail.com") {
            $files = Request::file('filefield');
            $arreglo = ["cantidad" => 0];
            $pack = new \App\Pack();
            $pack->user_id = 1;
            $pack->cant_notes = count($files);
            $pack->alias = "no usado";
            $pack->estado = str_random(6);
            $pack->save();
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $nombreOriginal = $file->getClientOriginalName();
                $nombreGenerado=$file->getFilename();
                $arreglo[$arreglo["cantidad"]] = [
                    "nombre_generado" => $nombreGenerado. "." . $extension,
                    "nombre_original" => $nombreOriginal
                ];
                
                $arreglo["cantidad"] ++;
                
                Storage::disk("local")->put($nombreOriginal . '.' . $extension, File::get($file));
                $entry = new Fileentry();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $nombreOriginal;
                $entry->filename = $nombreGenerado. '.' . $extension;
                $entry->save();

                if (strpos($nombreOriginal,"-")) {
                    $note = new \App\Note();
                    $note->pack_id = $pack->id;
                    $note->curso_id = 1;
                    $note->titulo = "ninguno";
                    $note->descripcion = "ninguno";
                    $note->contenido = "ninguno";
                    $note->numero = $numero = substr($nombreOriginal, 3);
                    $note->save();
                }
            }
            return $arreglo;
        } else {
            return "No tienes permisos para generar cartones";
        }
    }

    public function getUrls($cantidad) {

//        for($i=1;$i<=$cantidad;$i++){
//            $ur=\App\Classes\Numeracion::codificar($i);
//            for($j=1;$j<=20;$j++){
//                if($j==1){
//                    echo "http://qrnotes.co/a/c$ur <br>";
//                }
//                echo "http://qrnotes.co/a/c$ur/$j <br>";
//            }
//            
//        }

        for ($i = 1; $i <= $cantidad; $i++) {
            $ur = \App\Classes\Numeracion::codificar($i);
            for ($j = 1; $j <= 20; $j++) {
                if ($j == 1) {
                    echo "c$ur <br>";
                }
                echo "c$ur-$j <br>";
            }
        }
    }

}
