<?php

namespace App\Repositories;

use App\Models\Tag;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TagRepository
 * @package App\Repositories
 * @version July 20, 2018, 8:37 pm UTC
 *
 * @method Tag findWithoutFail($id, $columns = ['*'])
 * @method Tag find($id, $columns = ['*'])
 * @method Tag first($columns = ['*'])
*/
class TagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tag::class;
    }
}
