<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Services\Admin\RoleService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Role\RoleRequest;
class RoleController extends Controller
{
    protected $roleService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }
    public function index()
    {
        //
        try{
            $data = $this->roleService->getAllRoleService();
            return Response::data($data);
        }catch(\Throwable $th){
            return Response::dataError($th->getMessage(),[],$th->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
        try{
            $data = $this->roleService->createRoleService($request);
            return Response::data($data);
        }catch(\Throwable $th){
            return Response::data($th->getMessage(),[],$th->getCode());
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
            $data = $this->roleService->getRoleByIdService($id);
            if(!$data) {
                return Response::dataError($data);
            }
            return Response::data($data);
        }catch(\Throwable $th){
            return Response::data($th->getMessage(),[],$th->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        //
        try{
            $data = $this->roleService->updateRoleService($id,$request);
            return Response::data($data);
        }catch(\Throwable $th){
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
            $data = $this->roleService->deleteRoleService($id);
            return Response::data($data,'delete successfully');
        }catch(\Throwable $th){
            return Response::data($th->getCode(),[],$th->getMessage());
        }
    }
}
