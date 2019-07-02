<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model{

    protected $fillable = [
        'name',
        'author',
        'publish_date',
        'category_id',
        'user_id'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
