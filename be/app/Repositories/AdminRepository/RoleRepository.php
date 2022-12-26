<?php 
namespace App\Repositories\AdminRepository;
use App\Models\Role;
use App\Http\Requests\Admin\Role\RoleRequest;
class RoleRepository{
    protected $role;
    public function __construct(Role $role){
        $this->role = $role;
    }
    public function getAllRoleRepository(){
        return $this->role->all();
    }
    public function getRoleByIdRepository($id){
        return $this->role->find($id);
    }
    public function createRoleReposirory(RoleRequest $request){
        $request->validated();
        $role= new $this->role;
        $role->name = $request['name'];
        $role->save();
        return $role;
    }
    public function updateRoleRepository(RoleRequest $request,$id){
        $request->validated();
        $role = $this->role->find($id);
        $role->name = $request['name'];
        $role->update();
    }
    public function deleteRoleRepository($id){
        $role= $this->role->find($id);
        if($role){
            $role->delete();
        }
        return $role;
    }
}
?>