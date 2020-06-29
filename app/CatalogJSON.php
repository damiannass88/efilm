<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CatalogJSON extends Model
{
    protected $table = "catalogs";
    protected $fillable = [
        'titlemovie',
        'moviedescription',
        'moviecountry',
        'typesmovie',
        'created_at',
        'updated_at',
    ];
    public $timestramps = false;
    public function count(){
        return count($this->items);
    }
}