<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carton extends Model {

    protected $table = 'cartones';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    
}
