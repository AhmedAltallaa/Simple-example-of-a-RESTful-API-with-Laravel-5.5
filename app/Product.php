<?php

namespace App;

use App\Seller;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

	const AVAILABLE_PRODUCT = 'available';
	const UNAVAILABLE_PRODUCT = 'unavailable';

    
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'name',
    	'description',
    	'price',
    	'status',
    	'image',
        'seller_id',        
        'category_id'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function isAvailable()
    {
    	return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }    
}
