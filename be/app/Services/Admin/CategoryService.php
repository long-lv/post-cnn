<?php 
namespace app\Services\Admin;

use App\Helper\Response;
use App\Repositories\AdminRepository\CategoryRepository;

class CategoryService {
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllCategoryService(){
        try{
            $data = $this->categoryRepository->getCategoryRepository();
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function getCategoryByIdService($id){
        try{
            $data = $this->categoryRepository->getCategoryByIdRepository($id);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function createCategoryService($request){
        try{
            $data = $this->categoryRepository->createCategoryRepository($request);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function updateCategoryService($request,$id){
        try{
            $data = $this->categoryRepository->updateCategoryRepository($id,$request);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function destroyCategoryService($id){
        try{
            $data = $this->categoryRepository->destroyCategoryRepository($id);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
}
?>