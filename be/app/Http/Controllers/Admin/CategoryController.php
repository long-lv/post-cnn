<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Http\Request;
use App\Services\Admin\CategoryService;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    protected $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        //
        try{
            $data = $this->categoryService->getAllCategoryService();
            return Response::data($data);
        }catch(Exception $e){
            return Response::dataError($e->getMessage(),$e->getCode(),[]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        try{
            $data = $this->categoryService->createCategoryService($request);
            return Response::data($data);
        }catch(Throwable $e){
            return Response::dataError($e->getMessage(),$e->getCode(),[]);
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
            $data = $this->categoryService->getCategoryByIdService($id);
            return Response::data($data);
        }catch(Throwable $e){
            return Response::dataError($e->getMessage(),$e->getCode(),[]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
         try{
            $data = $this->categoryService->updateCategoryService($request,$id);
            return Response::data($data);
        }catch(Throwable $e){
            return Response::dataError($e->getMessage(),$e->getCode(),[]);
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
            $data = $this->categoryService->destroyCategoryService($id);
            return Response::data($data);
        }catch(Throwable $e){
            return Response::dataError($e->getMessage(),$e->getCode(),[]);
        }
    }
}
