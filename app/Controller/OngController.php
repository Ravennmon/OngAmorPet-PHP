<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Ong;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\OngDao;
use App\Validations\OngValidation;
use Exception;

class OngController extends Controller
{
    protected $fields = [
        'name' => 'Nome',
        'email' => 'Email',
        'cnpj' => 'CNPJ',
        'phone' => 'Telefone',
        'zipcode' => 'CEP',
        'state' => 'Estado',
        'city' => 'Cidade',
        'neighborhood' => 'Bairro',
        'address' => 'Endereço',
        'number' => 'Número',
        'complement' => 'Complemento'
    ];


    public function index()
    {
        $ongs = (new OngDao())->get();

        View::render('admin/ongs/index', [
            'title' => 'Lista de Ongs',
            'ongs' => $ongs
        ]);
    }

    public function create(){
        View::render('admin/ongs/create', [
            'title' => 'Cadastrar Ong',
            'fields' => $this->fields
        ]);
    }

    public function edit($id)
    {        
        $ong = (new OngDao())->find($id);
        $animals = (new OngDao())->getAnimals($ong['id']);

        View::render('admin/ongs/edit', [
            'title' => 'Editar Ong',
            'ong' => $ong,
            'fields' => $this->fields,
            'animals' => $animals
        ]);
    }

    public function store()
    {
        $validation = OngValidation::store($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }

        try {
            $ong = new Ong(
                $this->request->name,
                $this->request->email,
                $this->request->cnpj,
                $this->request->phone,
                $this->request->zipcode,
                $this->request->address,
                $this->request->city,
                $this->request->neighborhood,
                $this->request->state,
                $this->request->number,
                $this->request->complement,
            );
    
            $baseDao = new OngDao();
    
            $created = $baseDao->store($ong);
    
            return Response::success($created);
        } catch(Exception $e){
            return Response::error($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $ongDao = new OngDao();

            $ong = $ongDao->find($id);
    
            Response::success($ong);
        } catch(Exception $e){
            return Response::error($e->getMessage());
        }
    }

    public function update($id)
    {
        $validation = OngValidation::update($this->request, $id);

        if ($validation !== true) {
            return Response::error($validation);
        }

        try {
            $ongDao = new OngDao();

            $ongDao->update([
                'name' => $this->request->name,
                'email' => $this->request->email,
                'cnpj' => $this->request->cnpj,
                'phone' => $this->request->phone,
                'zipcode' => $this->request->zipcode,
                'address' => $this->request->address,
                'city' => $this->request->city,
                'neighborhood' => $this->request->neighborhood,
                'state' => $this->request->state,
                'number' => $this->request->number,
                'complement' => $this->request->complement,
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
            $ongDao = new OngDao();

            $ongDao->delete($id);

            Response::success(true);
        
        } catch(Exception $e){
            Response::error($e->getMessage());
        }
        
    }
}