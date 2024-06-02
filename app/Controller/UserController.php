<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Core\Response;

class UserController extends Controller
{
    public function store()
    {
        $user = new User();

        $user->create([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'password' => password_hash($this->request->password, PASSWORD_BCRYPT),
            'remember_me' => $this->request->remember_me,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Response::success('User created successfully');
    }

    public function show($id)
    {
        $user = new User();

        $user = $user->find($id);

        Response::success($user);
    }

    public function update($id)
    {
        $user = new User();

        $sql = $user->update([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'updated_at' => date('Y-m-d H:i:s')
        ], $id);

        return Response::success($sql);
    }

    public function destroy($id)
    {
        $user = new User();

        $user->delete($id);

        return Response::success('User deleted successfully');
    }
}