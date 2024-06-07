<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\BaseDao;
use App\Dao\UserDao;

class UserController extends Controller
{
    public function index()
    {
        View::render('signup', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);
    }

    public function store()
    {
        $user = new User(
            $this->request->name,
            $this->request->email,
            $this->request->password,
            false
        );

        $baseDao = new UserDao();

        $baseDao->store($user);

        // Response::success('User created successfully');
        View::render('cadastrosucess', ['title' => 'Home Page', 'content' => 'Welcome to the Home Page']);

    }

    public function show($id)
    {
        $userDao = new UserDao();

        $user = $userDao->find($id);

        Response::success($user);
    }

    public function update($id)
    {
        $userDao = new UserDao();

        $sql = $userDao->update([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'updated_at' => date('Y-m-d H:i:s')
        ], $id);

        return Response::success($sql);
    }

    public function destroy($id)
    {
        $userDao = new UserDao();

        $userDao->delete($id);

        return Response::success('User deleted successfully');
    }
}