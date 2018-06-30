<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase_cartum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clase_carta';

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
    protected $fillable = ['precio_c', 'precio_v', 'probabilidad', 'nombre', 'imgUrl'];

    public function setUpdatedAt($value)
    {
        return NULL;
    }


    public function setCreatedAt($value)
    {
        return NULL;
    }

    
}
