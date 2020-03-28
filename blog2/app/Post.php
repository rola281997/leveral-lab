<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
class Post extends Model
{
    use Sluggable;
    protected $fillable=[
        'title',
        'description',
        'user_id',
        'slug'
    ];

    public function user()
    {
        //User::class == 'App\User'
        return $this->belongsTo(User::class);
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * Get the post's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getDataFormAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

}


