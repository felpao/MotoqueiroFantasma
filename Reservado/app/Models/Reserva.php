<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Reserva extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'reservas';

    protected $fillable = [
        'equipamento_id',
        'local_id',
        'cliente_id',
        'data',
        'horario',
        'devolucao'
    ];

    public $timestamps = true;


    public function equipamento(){
        return $this->belongsTo(Equipamento::class,'equipamento_id');
    }
    public function local(){
        return $this->belongsTo(Local::class,'local_id');
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

}
