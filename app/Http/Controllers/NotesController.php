<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NotesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Url a la que se accede desde el scanner
     * @param type $pack
     * @param type $note
     * @return type
     */
    public function getIndex($pack, $note) {
        $packid = \App\Classes\Numeracion::decodificar(substr($pack, 1));
        $pack = \App\Pack::find($packid);
        $note = $pack->notes()->where("numero", $note)->first();
        if ($pack->user_id == Auth::user()->id) {
            if ($note->contenido == "http://www.qrnotes.co/img/upload.png") {
                return view("app.subir_note");
            } else {
                if ($note->titulo == "Activa" || $note->descripcion == "Utiliza tu note escaneando el código en el sticker...") {
                    return view("app.formulario_note");
                } else {
                    return view("app.note_vista")->withNote($note);
                }
            }
        }else{
            return "Este pack no te pertenece";
        }
    }

    public function postIndex($pack, $note) {
        $packid = \App\Classes\Numeracion::decodificar(substr($pack, 1));
        $pack = \App\Pack::find($packid);
        $note = $pack->notes()->where("numero", $note)->first();
        $retorno = "nada";
        if (Request::hasFile('filefield')) {
            $file = Request::file('filefield');
            $extension = $file->getClientOriginalExtension();
            Storage::disk("google")->put($file->getFilename() . '.' . $extension, File::get($file));
            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $nombreAsignado = $file->getFilename() . '.' . $extension;
            $entry->filename = $nombreAsignado;
            $entry->save();
            $note->contenido = "http://www.qrnotes.co/archivos/cloud/$nombreAsignado";
            $note->titulo = "Activa";
            $retorno = "cambio";
            $note->save();
        } else {
            $titulo = Request::input("titulo");
            $descripcion = Request::input("descripcion");
            $note->titulo = $titulo;
            $note->descripcion = $descripcion;
            $note->save();
            return back();
        }
    }

    public function getRegistro($pack, $note, $otro) {
        return "Pack: $pack, Note$note,Otro: $otro";
    }

}
