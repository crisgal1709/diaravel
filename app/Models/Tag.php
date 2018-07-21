<?php

namespace App\Models;

use App\Traits\Slugable;
use App\Traits\UserId;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Tag
 * @package App\Models
 * @version July 20, 2018, 8:37 pm UTC
 *
 * @property string name
 * @property integer user_id
 */
class Tag extends Model
{
    use SoftDeletes;
    use UserId;
    use Slugable;

    public $table = 'tags';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required:unique'
    ];

    public function posts(){

        return $this->belongsToMany(Post::class, 'posts_tags');

    }

    public static function boot(){

        parent::boot();

        static::deleting(function($tag){

           $tag->deletePivotRows();

        });

    }

    private function deletePivotRows(){
        DB::table('posts_tags')
                        ->where('tag_id', '=', $this->id)
                        ->delete();
    }
    
}
