<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Tutor;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\TutorDao;
use App\Validations\TutorValidation;

class TutorController extends Controller
{
    protected $fields = [
        'name' => 'Nome',
        'email' => 'Email',
        'cpf' => 'CPF',
        'phone' => 'Telefone',
        'zipcode' => 'CEP',
        'address' => 'Endereço',
        'city' => 'Cidade',
        'neighborhood' => 'Bairro',
        'state' => 'Estado',
        'number' => 'Número',
        'complement' => 'Complemento'
    ];

    public function index()
    {
        $tutors = (new TutorDao())->get();

        View::render('admin/tutors/index', [
            'tutors' => $tutors
        ]);
    }

    public function create(){
        View::render('admin/tutors/create', [
            'fields' => $this->fields
        ]);
    }

    public function edit($id)
    {
        $tutor = (new TutorDao())->find($id);

        View::render('admin/tutors/edit', [
            'tutor' => $tutor,
            'fields' => $this->fields
        ]);
    }

    public function store()
    {
        $validation = TutorValidation::validate($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }

        $tutor = new Tutor(
            $this->request->name,
            $this->request->email,
            $this->request->cpf,
            $this->request->phone,
            $this->request->zipcode,
            $this->request->address,
            $this->request->city,
            $this->request->neighborhood,
            $this->request->state,
            $this->request->number,
            $this->request->complement,
        );

        $baseDao = new TutorDao();

        $created = $baseDao->store($tutor);

        return Response::success($created);
    }

    public function show($id)
    {
        $tutorDao = new TutorDao();

        $tutor = $tutorDao->find($id);

        Response::success($tutor);
    }

    public function update($id)
    {
        $tutorDao = new TutorDao();

        $sql = $tutorDao->update([
            'name' => $this->request->name,
            'email' => $this->request->email,
            'cpf' => $this->request->cpf,
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

        return Response::success($sql);
    }

    public function destroy($id)
    {
        $tutorDao = new TutorDao();

        $tutorDao->delete($id);

        header('Location: /tutors');
    }
}