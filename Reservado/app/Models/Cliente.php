<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Cliente extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'enderecos',
        'fone'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Uuid::uuid4();
        });
    }


}
