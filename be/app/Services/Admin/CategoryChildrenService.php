<?php

namespace App\Services\Admin;

use App\Helper\Response;
use App\Repositories\AdminRepository\CategoryChildrenRepository;
use Mockery\Exception;

class CategoryChildrenService
{
    protected $categoryChildrenRepository;
    public function __construct(CategoryChildrenRepository $categoryChildrenRepository){
        $this->categoryChildrenRepository= $categoryChildrenRepository;
    }
    public function getAllCateChildrenService(){
        try{
            $category = $this->categoryChildrenRepository->getAllCateChildrenRepo();
            return $category;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function getCateChildrenByIdService($id){
        try{
            $category = $this->categoryChildrenRepository->getCateChildrenByIdRepo($id);
            return $category;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function saveCateChildrenService($request){
        try {
            $category = $this->categoryChildrenRepository->saveCateChildrenRepo($request);
            return $category;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function updateCateChildrenService($request,$id){
        try {
            $category = $this->categoryChildrenRepository->updateCateChildrenRepo($request,$id);
            return $category;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function destroyCateChildrenService($id){
        try {
            $category = $this->categoryChildrenRepository->destroyCateChildrenRepo($id);
            return $category;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
}
