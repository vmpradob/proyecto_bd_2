<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jugador';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_usuario';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'dinero'];

    public function usuario()
    {
        return $this->hasOne('App\Users','id','id_usuario');
    }
    public function cartas()
    {
        return $this->belongsToMany('App\Cartas','jugador_posee_carta','id_jugador','id_carta');
    }
    public function compras()
    {
        return $this->hasMany('App\Compra','id_jugador','id');
    }
    public function detalles_intercambio()
    {
        return $this->hasMany('App\Detalles_intercambio');
    }
    public function setUpdatedAt($value)
    {
        return NULL;
    }


    public function setCreatedAt($value)
    {
        return NULL;
    }
}
