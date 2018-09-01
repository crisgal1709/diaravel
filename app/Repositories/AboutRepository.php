<?php

namespace App\Repositories;

use App\Models\About;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AboutRepository
 * @package App\Repositories
 * @version September 1, 2018, 1:09 pm UTC
 *
 * @method About findWithoutFail($id, $columns = ['*'])
 * @method About find($id, $columns = ['*'])
 * @method About first($columns = ['*'])
*/
class AboutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'subtitle',
        'content',
        'important'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return About::class;
    }
}
