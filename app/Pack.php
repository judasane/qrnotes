<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model {

    protected $table = 'packs';

    public function user() {
        return $this->belongsTo('App\User');
    }
        
    public function notes() {
        return $this->hasMany('App\Note');
    }
    
}
