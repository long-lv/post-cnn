<?php 
namespace App\Services\Admin;

use App\Helper\Response;
use App\Repositories\AdminRepository\RoleRepository;

class RoleService{
    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    public function getAllRoleService(){
        try{
            $data = $this->roleRepository->getAllRoleRepository();
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e.getcwd());
        }
    }
    public function getRoleByIdService($id){
        try{
            $data = $this->roleRepository->getRoleByIdRepository($id);
            return $data;
        }catch(\Exception $e ){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function createRoleService($data){
        try{
            $data = $this->roleRepository->createRoleReposirory($data);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function updateRoleService($id,$data){
        try{
            $data = $this->roleRepository->updateRoleRepository($data,$id);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
    public function deleteRoleService($id){
        try{
            $data = $this->roleRepository->deleteRoleRepository($id);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getMessage(),[],$e->getCode());
        }
    }
}
?>
