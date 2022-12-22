<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Helper\Response;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index()
    {
        //
            try{
                $result=$this->userService->getListUser();
                return Response::data($result);
            }catch (\Throwable $th){
                return Response::dataError($th->getCode(), [], $th->getMessage());
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        try {
            $result = $this->userService->saveUser($request);
            return Response::data($result);
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
            $result = $this->userService->getUserById($id);
            return Response::data($result);
        }catch (\Throwable $th){
            return Response::dataError($th->getMessage(),[], $th->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateUserRequest $request)
    {
        //
        try {
           $result = $this->userService->updateUser($id,$request);
           return Response::data($result);
        }catch (\Throwable $th){
           return Response::dataError($th->getMessage(),[],$th->getCode());
        }
        return response()->json($result);
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
        try {
            $result=$this->userService->deleteUser($id);
            return Response::data($result);
        }catch (\Throwable $th){
           return Response::dataError($th->getMessage(),[], $th->getCode());
        }
    }
}
