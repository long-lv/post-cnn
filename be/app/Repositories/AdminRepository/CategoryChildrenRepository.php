<?php

namespace App\Repositories\AdminRepository;

use App\Http\Requests\CategoryChildren\CategoryChildrenRequest;
use App\Models\CategoryChildren;

class CategoryChildrenRepository
{
    protected $categoryChildren;
    public function __construct(CategoryChildren $categoryChildren)
    {
        $this->categoryChildren  = $categoryChildren;
    }
    public function getAllCateChildrenRepo(){
        return $this->categoryChildren->paginate(15);
    }
    public function getCateChildrenByIdRepo($id){
        return $this->categoryChildren->find($id);
    }
    public function saveCateChildrenRepo(CategoryChildrenRequest $categoryChildrenRequest){
        $categoryChildrenRequest->validated();
        $category = new $this->categoryChildren;
        $category->name = $categoryChildrenRequest['name'];
        $category->parent_category = $categoryChildrenRequest['parent_category'];
        $category->created_by = $categoryChildrenRequest['created_by'];
        $category->save();
        return $category;
    }
    public function updateCateChildrenRepo(CategoryChildrenRequest $categoryChildrenRequest,$id){
        $categoryChildrenRequest->validated();
        $category = $this->categoryChildren->find($id);
        $category->name = $categoryChildrenRequest['name'];
        $categoryChildrenRequest->parent_category = $categoryChildrenRequest['parent_category'];
        $categoryChildrenRequest->created_by = $categoryChildrenRequest['created_by'];
        $category->update();
        return $category;
    }
    public function destroyCateChildrenRepo($id){
        $category = $this->categoryChildren->find($id);
        if($category) $category->delete();
        return $category;
    }
}
