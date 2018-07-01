<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $clases
 * @property mixed $compras
 */
class Sobre extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sobre';

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
    protected $fillable = ['nombre', 'precio', 'cant_cartas', 'imgUrl'];

    public function clases()
    {
        return $this->belongsTo('App\Clase','id_clase','id');
    }
    public function compras()
    {
        return $this->hasMany('App\Compra','id_sobre','id');
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
