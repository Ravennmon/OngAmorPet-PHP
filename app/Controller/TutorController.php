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
            'title' => 'Lista de Tutores',
            'tutors' => $tutors
        ]);
    }

    public function create(){
        View::render('admin/tutors/create', [
            'title' => 'Cadastrar Tutor',
            'fields' => $this->fields
        ]);
    }

    public function edit($id)
    {
        $tutorDao = new TutorDao();
        $tutor = $tutorDao->find($id);
        $animals = $tutorDao->getAnimals($tutor['id']);

        View::render('admin/tutors/edit', [
            'title' => 'Editar Tutor',
            'tutor' => $tutor,
            'fields' => $this->fields,
            'animals' => $animals
        ]);
    }

    public function store()
    {
        $validation = TutorValidation::store($this->request);

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

        $validation = TutorValidation::update($this->request, $id);

        if ($validation !== true) {
            return Response::error($validation);
        }

        try {
            $tutorDao->update([
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

            return Response::success(true);
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $tutorDao = new TutorDao();

        $tutorDao->delete($id);

        header('Location: /tutors');
    }
}