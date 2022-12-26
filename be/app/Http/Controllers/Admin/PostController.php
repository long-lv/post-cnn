<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Services\Admin\PostService;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $postService;
    public function __construct(PostService $postService){
        $this->postService = $postService;
    }
    public function index()
    {
        //
        try{
            $data = $this->postService->getAllService();
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
    public function store(PostRequest $request)
    {
        //
        try{
            $data = $this->postService->savePostService($request);
            return Response::data($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getMessage());
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
            $data = $this->postService->getPostByIdService($id);
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
    public function update(PostRequest $request, $id)
    {
        //
        try{
            $data = $this->postService->updatePostService($request,$id);
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
            $data = $this->postService->destroyPostService($id);
            return Response::dataError($data);
        }catch (\Throwable $th){
            return Response::dataError($th->getCode(),[],$th->getMessage());
        }
    }
}
