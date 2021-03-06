<?php

namespace App\Models;

use App\Traits\Slugable;
use App\Traits\UserId;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Category
 * @package App\Models
 * @version July 20, 2018, 8:37 pm UTC
 *
 * @property string name
 * @property integer user_id
 */
class Category extends Model
{
    use SoftDeletes;
    use UserId;
    use Slugable;

    public $table = 'categories';
    

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

        return $this->belongsToMany(Post::class, 'categories_posts');
    }

    public static function boot(){

        parent::boot();

        static::deleting(function($category){

           $category->deletePivotRows();

        });

    }

    private function deletePivotRows(){
        DB::table('categories_posts')
                        ->where('category_id', '=', $this->id)
                        ->delete();
    }

    
}
