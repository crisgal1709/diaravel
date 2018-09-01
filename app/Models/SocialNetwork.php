<?php

namespace App\Models;

use App\Traits\UserId;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SocialNetwork
 * @package App\Models
 * @version September 1, 2018, 1:59 pm UTC
 *
 * @property string name
 * @property string icon
 * @property string link
 * @property boolean status
 * @property integer user_id
 */
class SocialNetwork extends Model
{
    use SoftDeletes;
    use UserId;

    public $table = 'social_networks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'icon',
        'link',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'icon' => 'string',
        'link' => 'string',
        'status' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'icon' => 'required',
        'link' => 'required',
        'status' => 'required'
    ];

    public static function iconsAvailable()
    {
        return [
            'fa-facebook' => 'Facebook',
        ];

    }

    
}
