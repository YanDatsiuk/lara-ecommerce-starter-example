<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRelation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_relations';


    /**
     * Get parent category.
     */
    public function parentCategory()
    {
        return $this->belongsTo('App\Category', 'parent_category_id');
    }

    /**
     * Get child category.
     */
    public function childCategory()
    {
        return $this->belongsTo('App\Category', 'child_category_id');
    }
}
