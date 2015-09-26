<?php

namespace App\Classes;

/**
 * Permite trabajar con la numeración base 62
 *
 * @author Juan_2
 */
class Numeracion {

    public static function codificar($id) {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortenedId = '';
        while ($id > 0) {
            $remainder = $id % 62;
            $id = ($id - $remainder) / 62;
            $shortenedId = $alphabet{$remainder} . $shortenedId;
        };
        return $shortenedId;
    }

    public static function decodificar($id) {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $number = 0;
        foreach (str_split($id) as $letter) {
            $number = ($number * 62) + strpos($alphabet, $letter);
        }
        return $number;
    }

}
