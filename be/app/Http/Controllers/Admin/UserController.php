<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        //
            $result=[];
            try{
                $result=[
                    'data'=>$this->userRepository->getListUser(),
                    'status'=>200
                ];
            }catch (Exception $e){
                $result=[
                    'status'=>500,
                    'error'=>$e->getMessage()
                ];
            }
            return response()->json($result);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        try {
            $result = [
                'status'=>200,
                'data'=>$this->userRepository->createUser($request),
                'msg'=>'create user success'
            ];
        }catch (Exception $e){
            $result = [
                'status'=> 500,
                'error'=> $e->getMessage(),
                'msg'=>'create user not success'
            ];
        }
        return response()->json($result);
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
        $result=[];
        try{
            $result=[
                'data'=>$this->userRepository->getUserById($id),
                'status'=>200
            ];
        }catch (Exception $e){
            $result=[
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        try {
            $result = [
                'status'=>200,
                'data'=>$this->userRepository->updateUser($id,$request),
                'msg'=>'update user success'
            ];
        }catch (Exception $e){
            $result = [
                'status'=> 500,
                'error'=> $e->getMessage(),
                'msg'=>'update user not success'
            ];
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
        $result = [];
        try {
            $result=[
                'status'=>200,
                'data'=>$this->userRepository->deleteUser($id),
                'msg'=>'delete user success'
            ];
        }catch (Exception $e){
            $result=[
                'status'=>500,
                'errors'=>$e->getMessage(),
                'msg'=>'delete user not success'
            ];
        }
        return response()->json($result);
    }
}
