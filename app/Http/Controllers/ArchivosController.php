<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ArchivosController extends Controller {

    /**
     * 
     * @param type $nombre Nombre del archivo
     */
    public function getCloud($nombre) {
        return $this->get($nombre, "google");
    }

    /**
     * 
     * @param type $nombre Nombre del archivo
     */
    public function getLocal($nombre) {
        return $this->get($nombre, "local");
    }
    
    /**
     * 
     * @param type $nombre Nombre del archivo
     */
    public function getGenerados($nombre) {
        return $this->get($nombre, "generados");
    }

    public function getNaked($nombre) {
        return $this->getN($nombre, "local");
    }

    /**
     * Sube archivo a google storage
     * @return string
     */
    public function postUploadCloud() {
        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk("google")->put($file->getFilename() . '.' . $extension, File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;

        $entry->save();

        return redirect('fileentry');
    }


    /**
     * Recibe múltiples archivos y los guarda en cloud
     * @return Arreglo con nombre original y nombre generado de cada archivo, 
     * además de la cantidad
     */
    public function postUploadMultipleCloud() {
        $files = Request::file('filefield');
        
        return $this->UploadMultiple($files, "google");
    }
    
    /**
     * Recibe múltiples archivos y los guarda en cloud
     * @return Arreglo con nombre original y nombre generado de cada archivo, 
     * además de la cantidad
     */
    public function postUploadMultipleLocal() {
        $files = Request::file('filefield');
        
        return $this->UploadMultiple($files, "local");
    }

    /**
     * Sube archivo a almacenamiento local
     * @return string
     */
    public function postUploadLocal() {
        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk("local")->put($file->getFilename() . '.' . $extension, File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;

        $entry->save();

        return redirect('fileentry');
    }

    private function get($filename, $disco) {

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk($disco)->get($entry->filename);
        return (new Response($file, 200))
                        ->header('Content-Type', $entry->mime);
    }

    private function getN($filename, $disco) {

        $file = Storage::disk($disco)->get($filename);
        return (new Response($file, 200))
                        ->header('Content-Type', $file->getClientMimeType());
    }

    /**
     * Sube múltiples archivos
     * @param iterable $files Objeto de archivos
     * @param string $disco Disco al que se subirán
     * @return arreglo con nombre generado y nombre original de cada archivo subido
     */
    public function UploadMultiple($files, $disco) {
        $arreglo = ["cantidad" => 0];
        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $arreglo[$arreglo["cantidad"]] = [
                "nombre_generado" => $file->getFilename() . "." . $extension,
                "nombre_original" => $file->getClientOriginalName()
            ];
            $arreglo["cantidad"] ++;
            Storage::disk($disco)->put($file->getFilename() . '.' . $extension, File::get($file));
            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $file->getFilename() . '.' . $extension;
            $entry->save();
        }
        return $arreglo;
    }

}
