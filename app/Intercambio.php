<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intercambio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'intercambio';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'id_jugador1', 'id_jugador2'];

    public function jugador()
    {
        return $this->hasOne('App\Jugador');
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
