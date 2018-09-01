<?php

namespace App\Repositories;

use App\Models\SocialNetwork;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SocialNetworkRepository
 * @package App\Repositories
 * @version September 1, 2018, 1:59 pm UTC
 *
 * @method SocialNetwork findWithoutFail($id, $columns = ['*'])
 * @method SocialNetwork find($id, $columns = ['*'])
 * @method SocialNetwork first($columns = ['*'])
*/
class SocialNetworkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'icon',
        'link',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SocialNetwork::class;
    }
}
