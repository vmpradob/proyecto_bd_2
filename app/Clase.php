<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Clase_carta';

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
    protected $fillable = ['nombre', 'precio_c', 'precio_v', 'probabilidad', 'imgUrl'];

    public function cartas()
    {
        return $this->belongsToMany('App\Carta','clase_carta_carta','id_clase','id_carta');
    }
    public function sobres()
    {
        return $this->hasMany('App\Sobre');
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
