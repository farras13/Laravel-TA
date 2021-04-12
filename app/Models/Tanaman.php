<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'tanaman';
    public $timestamps = false;
    protected $primaryKey = 'idTanaman';
    protected $fillable = [
        'idGen',
        'jk',
        'name',
    ];

    public function gen()
    {
        return $this->belongsTo('App\Models\gen');
    }

    public function persilangan()
    {
        return $this->hasOne('App\Models\persilangan');
    }
}
