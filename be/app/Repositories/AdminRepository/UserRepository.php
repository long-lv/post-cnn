<?php
namespace App\Repositories\AdminRepository;
use App\Models\User;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserRepository{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    public function getListUser(){
        return $this->user->all();
    }
    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        $user = $this->user->find($id);
        return $user;
    }
    public function createUser(CreateUserRequest $request)
    {
        // TODO: Implement createUser() method.
        $request->validated();
        $user = new $this->user;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role_id = $request['role_id'];
        $user->save();
        return $user;
    }
    public function updateUser($id, UpdateUserRequest $request)
    {
        // TODO: Implement UpdateUser() method.
       $user = $this->user->find($id);
       $user->password = Hash::make($request['password']);
       $user->role_id = $request['role_id'];
       return $user;
    }
    public function deleteUser($id)
    {
        // TODO: Implement deleteUser() method.
        $user = $this->user->find($id);
        if($user){
            $user->delete();
            return 'delete success';
        }
    }
}
?>
