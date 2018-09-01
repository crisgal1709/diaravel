<?php

namespace App\Models;

use App\Traits\HasArchives;
use App\Traits\HasPresenter;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

/**
 * Class About
 * @package App\Models
 * @version September 1, 2018, 1:09 pm UTC
 *
 * @property string title
 * @property string subtitle
 * @property string content
 * @property text important
 * @property integer user_id
 */
class About extends Model
{
    use SoftDeletes;
    use HasPresenter;
    use HasArchives;

    public $table = 'about';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'subtitle',
        'content',
        'important',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'subtitle' => 'string',
        'content' => 'string',
        'important' => 'text',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'subtitle' => 'required',
        'content' => 'required',
        'important' => 'required'
    ];

    public function setImage(Request $request)
    {   
        $this->archives->each->delete();

        return $this->saveArchives($request);
    }



    
}
