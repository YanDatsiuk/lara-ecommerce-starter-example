<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get category.
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /*
     * Get images
     */
    public function images()
    {
        return $this->morphToMany('App\Image', 'media', 'product_images', 'product_id');
    }

    /*
     * Get condition
     */
    public function getCondition(){

        switch ($this->condition){
            case 'new': return 'новий';
            case 'used': return 'б/у';
        }
    }
}
