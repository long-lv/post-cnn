<?php

namespace App\Services\Admin;

use App\Helper\Response;
use App\Repositories\AdminRepository\PostRepository;

class PostService
{
    protected $postRepository;
    public function __construct(PostRepository $postRepository){
        $this->postRepository = $postRepository;
    }
    public function getAllService(){
        try{
            $post = $this->postRepository->getALlPostRepository();
            return $post;
        }catch (\Exception $e ){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function getPostByIdService($id){
        try {
            $post = $this->postRepository->getPostById($id);
            return $post;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function savePostService($request){
        try {
            $post = $this->postRepository->savePostRepository($request);
            return $post;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function updatePostService($request,$id){
        try{
            $post = $this->postRepository->updateProductRepository($request,$id);
            return $post;
        }catch (\Exception $e){
            return Response::dataError($e->getCode(),[],$e->getMessage());
        }
    }
    public function destroyPostService($id){
        try{
            $post = $this->postRepository->destroyPostRepository($id);
            return $post;
        }catch (\Exception $e){
            return Response::data($e->getCode(),[],$e->getMessage());
        }
    }
}
