<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_images';

    /**
     * Get product.
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    /**
     * Get image.
     */
    public function image()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }
}
