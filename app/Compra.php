<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compras';

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
    protected $fillable = ['id_jugador', 'id_sobre', 'cantidad'];

    public function jugador()
    {
        return $this->belongsTo('App\Jugador');
    }
    public function sobre()
    {
        return $this->belongsTo('App\Sobre');
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
