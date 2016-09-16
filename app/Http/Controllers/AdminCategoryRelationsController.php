<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryRelation;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminCategoryRelationsController extends Controller
{
    /*
     * Page with list of category relations
     */
    public function categoryRelations()
    {

        //Getting all category relations
        $categoryRelations = CategoryRelation::all();

        return view('pages.admin.category-relations.category-relations', [
            'categoryRelations' => $categoryRelations
        ]);
    }

    /*
     * Create category relation page
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.category-relations.create',[
            'categories' => $categories
        ]);
    }

    /*
     * Store category relation page
     */
    public function store(Request $request)
    {

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Storing new category relation
            $categoryRelation = new CategoryRelation();
            $categoryRelation->child_category_id = $request->child_category_id;
            $categoryRelation->parent_category_id = $request->parent_category_id;
            $categoryRelation->save();
        }

        return $this->create();
    }

    /*
     * Edit category relation page
     */
    public function edit($id){

        $categoryRelation = CategoryRelation::find($id);

        $categories = Category::all();

        return view('pages.admin.category-relations.edit',[
            'categoryRelation' => $categoryRelation,
            'categories' => $categories
        ]);
    }

    /*
     * Update existing category relation
     */
    public function update(Request $request, $id){

        //Finding category relation by id
        $categoryRelation = CategoryRelation::find($id);

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Updating category relation
            $categoryRelation->child_category_id = $request->child_category_id;
            $categoryRelation->parent_category_id = $request->parent_category_id;
            $categoryRelation->save();
        }

        return $this->edit($id);
    }

    /*
     * Delete category relation
     */
    public function delete($id){

        $categoryRelation = CategoryRelation::find($id);
        $categoryRelation->delete();

        return $this->categoryRelations();
    }

    /*
     * VALIDATION
     */

    /**
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'child_category_id' => 'required|exists:categories,id',
            'parent_category_id' => 'required|exists:categories,id',
        ]);
    }
}
