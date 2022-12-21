<?php 
namespace App\Services;
use App\Repositories\AdminRepository\UserRepository;
use App\Helper\Response;
class UserService{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getListUser(){
        try{
                $data  = $this->userRepository->getListUser();
                return $data;
        }catch(\Exception $e) {
            return Response::dataError($e->getCode(), $e->getMessage());
        }   
    }
    public function saveUser($data){
        try{
            $data = $this->userRepository->createUser($data);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getCode(), $e->getMessage());
        }
    }
    public function getUserById($id){
        try{
            $data = $this->userRepository->getUserById($id);
            return $data;
        }catch(\Exception $e){
            return Response::dataError($e->getCode(), $e->getMessage());
        }
    }
    public function deleteUser($id){
        try{
            $data = $this->userRepository->deleteUser($id);
            return Response::data($data);
        }catch(\Exception $e){
            return Response::dataError($e->getCode(), $e->getMessage());
        }
    }
    public function updateUser($id,$request){
        try{
            $data = $this->userRepository->updateUser($id,$request);
            return $data;
        }catch(\Exception $e){
            return Response::data($e->getCode(), $e->getMessage());
        }
    }
}

?>