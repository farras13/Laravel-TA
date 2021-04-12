<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persilangan extends Model
{
    protected $table = 'persilangan';
    // public $timestamps = false;
    protected $primaryKey = 'kodePersilangan';
    protected $fillable = [
        'kodePersilangan',
        'tanggal',
        'seed',
        'pollen',
        'idAuth',
    ];

    public function tanaman()
    {
        return $this->belongsTo('App\Models\tanaman', 'seed');
    }

    public function tanamann()
    {
        return $this->belongsTo('App\Models\tanaman', 'pollen');
    }

}
