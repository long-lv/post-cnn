<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryChildren\CategoryChildrenRequest;
use App\Services\Admin\CategoryChildrenService;
use App\Services\Admin\PostService;
use Illuminate\Http\Request;

class CategoryChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $categoryChildrenService;
    public function __construct(CategoryChildrenService $postService){
        $this->postService = $postService;
    }
    public function index()
    {
        //
        try{
            $data = $this->postService->getAllCateChildrenService();
            return Response::data($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryChildrenRequest $request)
    {
        //
        try {
            $data = $this->postService->saveCateChildrenService($request);
            return Response::data($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try{
            $data = $this->postService->getCateChildrenByIdService($id);
            return Response::data($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryChildrenRequest $request, $id)
    {
        //
        try{
            $data = $this->postService->updateCateChildrenService($request,$id);
            return Response::data($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $data = $this->postService->destroyCateChildrenService($id);
            return Response::data($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getMessage());
        }
    }
}
