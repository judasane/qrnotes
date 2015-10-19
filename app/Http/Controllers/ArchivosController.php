<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
    
    /**
     * Devuelve una imagen con el tamaño especificado
     * Ruta: qrnotes.co/archivos/foto/nombrearchivo/ancho/alto
     * @param type $foto Nombre del archivo (incluída extensión)
     * @param type $width Ancho, si es cero, se calcula, si sólo se pasa un parámetro, será este
     * @param type $height Altura, si es cero, se calcula
     * Si $height y $width son cero, no se cambia el tamaño
     * @return type
     */
    public function getFoto($foto, $width = 0,$height = 0) {
        $img = Image::make("http://www.qrnotes.co/archivos/cloud/$foto")->orientate();
        $hh = $img->height();
        $ww = $img->width();
        if ($height != 0 && $width != 0) {
            $img->resize($width, $height );
        }else if($height==0 && $width==0){
//            No hacer nada
        }
        else if ($height == 0) {
            $height=  $hh/$ww*$width;//($ww/$hh)*$width;
            $img->resize($width, $height );
        }else{
            $width=$ww/$hh*$height;
            $img->resize($width, $height );
        }
        //Define la posición del texto, y pasa la altura para calcular el tamaño
        $img->text('www.qrnotes.co', $width-($height/25*9), $height-($height/50), function($font) use($height    )  {
            $font->file("font/roboto/Roboto-Bold.ttf");
            $font->size($height/25);
            $font->color(array(0, 0, 0, 0.5));
        })->greyscale();

        return $img->response('jpg');
    }

    public function getPruebas($height = 100, $width = 100) {
        $img = Image::make('http://www.qrnotes.co/archivos/cloud/phpF1VTYY.jpg')->resize($height, $width);

        return $img->response('jpg');
    }

}
