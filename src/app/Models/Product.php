<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [ 
        'name',
        'price' ,
        'brand',
        'detail',
        'image',
    ];

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public function mylists()
    {
        return $this->hasMany(Mylist::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_products');
    }
  

    public function seller()
    {
        return $this->belongsTo(User::class, 'sell_user_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buy_user_id');
    }


}
