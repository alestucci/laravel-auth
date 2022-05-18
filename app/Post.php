<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    static public function titleToSlug($string) {
        $slug = Str::of($string)->slug('-');
        $_i = '0';
        while(self::where('slug', $slug)->first()) {
            if ($_i === 0) {
                $_i = '';
                return $_i;
            }
            $slug = "$slug-$_i";
            $_i++;
        }
        return $slug;

    }
}
