<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {

    protected $table = 'notes';

    public function pack() {
        return $this->belongsTo('App\Carton');
    }

}
