<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'category', 'subcategory', 'lab_id', 'price'
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'category', 'id');
    }
}
