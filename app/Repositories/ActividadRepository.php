<?php

namespace App\Repositories;

use App\Models\Actividad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ActividadRepository
 * @package App\Repositories
 * @version July 20, 2018, 5:49 pm UTC
 *
 * @method Actividad findWithoutFail($id, $columns = ['*'])
 * @method Actividad find($id, $columns = ['*'])
 * @method Actividad first($columns = ['*'])
*/
class ActividadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Actividad::class;
    }
}
