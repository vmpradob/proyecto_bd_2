<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property string nombre
 * @property  string imgUrl
 */
class Carta extends Model
{
    protected $connection = 'jugador';

    protected $table = 'carta';

    protected $fillable = [
      'imgUrl','nombre'
    ];
}
