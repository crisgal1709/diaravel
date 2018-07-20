<?php

namespace App\Models;

use App\Presenters\PostPresenter;
use App\Traits\HasArchives;
use App\Traits\UserId;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version July 20, 2018, 5:56 pm UTC
 *
 * @property string title
 * @property string body
 * @property string excerpt
 * @property string slug
 * @property boolean published
 * @property integer user_id
 */
class Post extends Model
{
    use SoftDeletes;
    use UserId;
    use HasArchives;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'body',
        'excerpt',
        'slug',
        'published',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'body' => 'string',
        'excerpt' => 'string',
        'slug' => 'string',
        'published' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        'excerpt' => 'required',
        'slug' => 'required',
        'published' => 'required'
    ];

    public function getRouteKeyName(){
        return 'slug';
    }


    public function categories(){

        return $this->belongsToMany(Category::class, 'categories_posts');

    }

    public function tags(){

        return $this->belongsToMany(Tag::class, 'posts_tags');

    }

    public function scopePublished($query){
        return $query->where('published', '=', 1)
                        ->with('archives')
                        ->get();
    }

    public function present(){
        return new PostPresenter($this);
    }



    
}
