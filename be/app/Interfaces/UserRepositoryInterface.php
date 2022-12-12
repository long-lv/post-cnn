<?php
namespace App\Interfaces;
use App\Http\Requests\Admin\UserRequest;
interface UserRepositoryInterface
{
    public function getListUser();
    public function getUserById($id);
    public function createUser(UserRequest $request);
    public function updateUser($id,UserRequest $request);
    public function deleteUser($id);
}
?>
