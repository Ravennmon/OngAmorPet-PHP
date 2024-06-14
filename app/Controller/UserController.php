<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\BaseDao;
use App\Dao\UserDao;
use App\Validations\UserValidation;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        View::render('register', ['title' => 'Cadastro de Usuário']);
    }

    public function store()
    {
        $validation = UserValidation::store($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }


        try {
            $user = new User(
                $this->request->name,
                $this->request->email,
                $this->request->password,
            );
    
            $baseDao = new UserDao();
    
            $stored = $baseDao->store($user);
    
            return Response::success($stored);
        } catch(Exception $e){
            return Response::error($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $userDao = new UserDao();

            $user = $userDao->find($id);
    
            Response::success($user);
        } catch(Exception $e){
            return Response::error($e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $userDao = new UserDao();

            $userDao->update([
                'name' => $this->request->name,
                'email' => $this->request->email,
                'updated_at' => date('Y-m-d H:i:s')
            ], $id);
    
            return Response::success(true);
        } catch(Exception $e){
            return Response::error($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $userDao = new UserDao();

            $userDao->delete($id);

            Response::success(true);
        
        } catch(Exception $e){
            Response::error($e->getMessage());
        }
        
    }
}