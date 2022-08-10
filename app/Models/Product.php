<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //added
    protected $table ='products';
    protected $fillable=[
      'cate_id',
      'name',
       'slug',
      'small_description',
      'description',
      'original_price',
      'selling_price',
      'image',
      'qty',
      'tax',
      'status',
      'trending',
      'meta_title',
      'meta_keywords',
      'meta_description',

    ];

    //use to established relationship between the category and product table.
    // cate_id is the foreign key and id from the category table is the primary key.

       public function category(){

      return $this->belongsTo(Category::class,'cate_id','id');
    }
}
