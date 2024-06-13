<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Ong;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\OngDao;
use App\Validations\OngValidation;

class OngController extends Controller
{
    public function index()
    {
        $ongs = (new OngDao())->get();

        View::render('admin/ongs/index', [
            'ongs' => $ongs
        ]);
    }

    public function create(){
        View::render('admin/ongs/create');
    }

    public function edit($id)
    {
        $ong = (new OngDao())->find($id);

        View::render('admin/ongs/edit', [
            'ong' => $ong
        ]);
    }

    public function store()
    {
        $validation = OngValidation::validate($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }

        $ong = new Ong(
            $this->request->name,
            $this->request->email,
            $this->request->cnpj,
            $this->request->phone,
            $this->request->zipcode,
            $this->request->address,
            $this->request->city,
            $this->request->state,
            $this->request->number,
            $this->request->complement,
        );

        $baseDao = new OngDao();

        $created = $baseDao->store($ong);

        return Response::success($created);
    }

    public function show($id)
    {
        $ongDao = new OngDao();

        $ong = $ongDao->find($id);

        Response::success($ong);
    }

    public function update($id)
    {
        $ongDao = new OngDao();

        $sql = $ongDao->update([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'cnpj' => $this->request->cnpj,
            'phone' => $this->request->phone,
            'zipcode' => $this->request->zipcode,
            'address' => $this->request->address,
            'city' => $this->request->city,
            'state' => $this->request->state,
            'number' => $this->request->number,
            'complement' => $this->request->complement,
            'updated_at' => date('Y-m-d H:i:s')
        ], $id);

        return Response::success($sql);
    }

    public function destroy($id)
    {
        $ongDao = new OngDao();

        $ongDao->delete($id);

        header('Location: /ongs');
    }
}