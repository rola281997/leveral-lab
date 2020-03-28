<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Post;


class CustomPost implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $posts=Post::find();
        dd($posts);
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This user can not create post.';
    }
}
