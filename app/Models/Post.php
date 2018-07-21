<?php

namespace App\Models;

use App\Presenters\PostPresenter;
use App\Traits\HasArchives;
use App\Traits\HasPresenter;
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
    use HasPresenter;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'body',
        'excerpt',
        'slug',
        'published',
        'user_id',
        'post_id',
        'approved'
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
                        ->with('categories')
                        ->with('tags')
                        ->with('archives');
                        
    }

    /**
     * Post has many Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
        return $this->hasMany(Comment::class)->where('approved', '=', 1);
    }



    
}
