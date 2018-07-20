<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actividad
 * @package App\Models
 * @version July 20, 2018, 5:49 pm UTC
 *
 * @property string nombre
 * @property boolean estado
 * @property string usuarios_relacionados
 * @property integer user_id
 */
class Actividad extends Model
{
    use SoftDeletes;

    public $table = 'actividads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'estado',
        'usuarios_relacionados',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'estado' => 'boolean',
        'usuarios_relacionados' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
