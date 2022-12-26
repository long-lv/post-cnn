<?php 
namespace app\Repositories\AdminRepository;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;

class CategoryRepository{
    protected $category;
    public function __construct(Category $category){
         $this->category= $category;
    }
    public function getCategoryRepository(){
        return $this->category->all();
    }
    public function getCategoryByIdRepository($id){
        return $this->category->find($id);
    }
    public function createCategoryRepository(CategoryRequest $request){
        $request->validated();
        $category = new $this->category;
        $category->name=$request['name'];
        $category->created_by=$request['created_by'];
        $category->save();
        return $category;
    }
    public function updateCategoryRepository($id,CategoryRequest $request){
        $category = $this->category->find($id);
        $request->validated();
        $category->name=$request['name'];
        $category->update();
        return $category;
    }
    public function destroyCategoryRepository($id){
        $category = $this->category->find($id);
        if($category) $category->delete();
        return $category;
    }

}
?>