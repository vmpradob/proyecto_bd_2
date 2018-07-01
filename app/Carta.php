<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carta';

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
    protected $fillable = ['nombre', 'imgUrl'];

    public function clases()
    {
        return $this->belongsToMany('App\Clase');
    }
    public function jugadores()
    {
        return $this->belongsToMany('App\Jugador');
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
