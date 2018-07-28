<?php

namespace App\Models;

use App\Traits\HasPresenter;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * @package App\Models
 * @version July 21, 2018, 3:44 pm UTC
 *
 * @property integer comment_id
 * @property string body
 * @property string name
 * @property string email
 */
class Comment extends Model
{
    use SoftDeletes;
    use HasPresenter;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'comment_id',
        'body',
        'name',
        'email',
        'approved',
        'post_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'comment_id' => 'integer',
        'body' => 'string',
        'name' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Comment has many Responses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = comment_id, localKey = id)
        $responses =  $this->hasMany(Comment::class, 'comment_id');

        if (!is_null(auth()->user()) && auth()->user()->id == 1) {
            return $responses;
        }

        return $responses->where('approved', '=', 1);
    }

    /**
     * Comment belongs to Comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        // belongsTo(RelatedModel, foreignKey = comment_id, keyOnRelatedModel = id)
        $comment = $this->belongsTo(Comment::class, 'comment_id');

        if (!is_null(auth()->user()) && auth()->user()->id == 1) {
            return $comment;
        }

        return $comment->where('approved', '=', 1);
    }

    /**
     * Comment belongs to Post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        // belongsTo(RelatedModel, foreignKey = post_id, keyOnRelatedModel = id)
        return $this->belongsTo(Post::class);
    }

    public static function boot(){
        parent::boot();

        static::deleting(function($comment){
            $comment->responses->each->delete();
        });
    }

    
}
