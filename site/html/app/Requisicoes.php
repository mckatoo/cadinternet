<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisicoes extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'requisicoes';

    /**
    * Relacionamentos
    */
    public function campus()
    {
        return $this->belongsTo('App\Campus','campus_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status','status_id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\UsuarioTipo','usuarioTipo_id');
    }
}
