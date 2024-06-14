<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Animal;
use App\Controller\Controller;
use App\Core\Response;
use App\Dao\AnimalDao;
use App\Dao\OngDao;
use App\Dao\TutorDao;
use App\Model\Tutor;
use App\Validations\AnimalValidation;
use Exception;

class AnimalController extends Controller
{
    protected $sizes = [
        'P' => 'Pequeno',
        'M' => 'Médio',
        'G' => 'Grande'
    ];

    protected $sexes = [
        'M' => 'Macho',
        'F' => 'Fêmea'
    ];

    protected $species = [
        'C' => 'Cachorro',
        'G' => 'Gato',
        'O' => 'Outros'
    ];

    public function index()
    {
        $animals = (new AnimalDao())->get();

        View::render('admin/animals/index', [
            'title' => 'Lista de Animais',
            'animals' => $animals
        ]);
    }

    public function create(){
        $ongs = (new OngDao())->get();

        View::render('admin/animals/create', [
            'title' => 'Cadastrar Animal',
            'ongs' => $ongs,
            'sizes' => $this->sizes,
            'sexes' => $this->sexes,
            'species' => $this->species
        ]);
    }

    public function edit($id)
    {
        $animal = (new AnimalDao())->find($id);
        $tutors = (new TutorDao())->get();
        $ong = (new OngDao())->find($animal['ong_id']);

        View::render('admin/animals/edit', [
            'title' => 'Editar Animal',
            'animal' => $animal,
            'tutors' => $tutors,
            'sizes' => $this->sizes,
            'sexes' => $this->sexes,
            'species' => $this->species,
            'ong' => $ong
        ]);
    }

    public function store()
    {
        $validation = AnimalValidation::store($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }

        try {

            $animal = new Animal(
                $this->request->name,
                $this->request->specie,
                $this->request->breed,
                $this->request->birth_date,
                $this->request->size,
                $this->request->sex,
                $this->request->ong_id
            );
    
            $baseDao = new AnimalDao();
    
            $created = $baseDao->store($animal);
    
            
            return Response::success($created);
        } catch(Exception $e){
            Response::error($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $animalDao = new AnimalDao();

            $animal = $animalDao->find($id);
    
            Response::success($animal);
        } catch(Exception $e){
            Response::error($e->getMessage());
        }
    }

    public function update($id)
    {
        $validation = AnimalValidation::update($this->request);

        if ($validation !== true) {
            return Response::error($validation);
        }

        try {
            $animalDao = new AnimalDao();

            $animalDao->update([
                'name' => $this->request->name,
                'specie' => $this->request->specie,
                'breed' => $this->request->breed,
                'birth_date' => $this->request->birth_date,
                'size' => $this->request->size,
                'sex' => $this->request->sex,
                'tutor_id' => $this->request->tutor_id,
                'ong_id' => $this->request->ong_id,
                'updated_at' => date('Y-m-d H:i:s')
            ], $id);
    
            return Response::success(true);
        } catch(Exception $e){
            Response::error($e->getMessage());
        }

    }

    public function destroy($id)
    {
        try {
            $animalDao = new AnimalDao();

            $animalDao->delete($id);

            Response::success(true);
        
        } catch(Exception $e){
            Response::error($e->getMessage());
        }
    }
}