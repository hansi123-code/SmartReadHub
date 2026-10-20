<?php

namespace App\Models;
use App\Models\BookRating;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'category',
        'cover_image',
        'pdf_file',
        'rating',
        'views',
        'downloads',
        'admin_id'
    ];

    public function admin()
{
    return $this->belongsTo(User::class,'admin_id');
}



public function ratings()
{
    return $this->hasMany(BookRating::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}



public function readingProgress()
{
    return $this->hasMany(ReadingProgress::class);
}

}


