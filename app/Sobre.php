<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $clases
 * @property mixed $compras
 * @property mixed precio
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
    protected $fillable = ['nombre', 'precio', 'cant_cartas', 'imgUrl','id_clase'];

    public function clases()
    {
        return $this->belongsTo('App\Clase','id_clase','id');
    }
    public function compras()
    {
        return $this->hasMany('App\Compra','id_sobre','id');
    }

    public function jugadores()
    {
        return $this->belongsToMany('App\Jugador','jugador_compra_sobre','id_sobre','id_jugador')->withPivot('cantdidad');
    }

    public function setUpdatedAt($value)
    {
        return NULL;
    }


    public function setCreatedAt($value)
    {
        return NULL;
    }

    public function cartas(){
        for($i=0; $i<$this->cant_cartas;$i++)
            $rawResult[$i] =DB::select(DB::raw('call carta_random()'));
        $objects = [];

        foreach($rawResult as $result)
        {
            $object = new Carta();

            $object->setRawAttributes((array)$result[0], true);

            $objects[] = $object;
        }

        return new Collection($objects);
    }
}
{}