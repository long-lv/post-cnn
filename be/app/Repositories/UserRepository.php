<?php
namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface {
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
        return $this->user->find($id);
    }
    public function createUser(UserRequest $request)
    {
        // TODO: Implement createUser() method.
        $request->validated();
        $user = new $this->user;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role_id = $request['role_id'];
        $user->save();
        return response()->json($user);
    }
    public function updateUser($id, UserRequest $request)
    {
        // TODO: Implement UpdateUser() method.
        $user = $this->user->find($id);
        $request->validated();
        if($user){
            $user->name = $request['name'];
            $user->password = Hash::make($request['password']);
            $user->role_id = $request['role_id'];
            $user->save();
        }
        return response()->json($user);
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
