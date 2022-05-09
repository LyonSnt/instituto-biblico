<?php

namespace App\Http\Controllers;

use App\DataTables\MatriculaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Repositories\MatriculaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Asignatura;
use App\Models\Estudiante;
use App\Models\Mes;
use App\Models\tblanioacademico;
use App\Models\tblaula;
use Response;

class MatriculaController extends AppBaseController
{
    /** @var MatriculaRepository $matriculaRepository*/
    private $matriculaRepository;

    public function __construct(MatriculaRepository $matriculaRepo)
    {
        $this->matriculaRepository = $matriculaRepo;
    }

    /**
     * Display a listing of the Matricula.
     *
     * @param MatriculaDataTable $matriculaDataTable
     *
     * @return Response
     */
    public function index(MatriculaDataTable $matriculaDataTable)
    {
        return $matriculaDataTable->render('matriculas.index');
    }

    /**
     * Show the form for creating a new Matricula.
     *
     * @return Response
     */
    public function create()
    {

        $estudiante = Estudiante::pluck('est_nombre', 'id');
        $asignatura = Asignatura::pluck('asg_nombre', 'id');
        $mes = Mes::pluck('mes_nombre', 'id');
        $anioacademico = tblanioacademico::pluck('ani_anio', 'id');
        $aula = tblaula::pluck('aul_nombre', 'id');
        return view('matriculas.create', compact('estudiante', 'asignatura', 'mes', 'anioacademico', 'aula'));
    }

    /**
     * Store a newly created Matricula in storage.
     *
     * @param CreateMatriculaRequest $request
     *
     * @return Response
     */
    public function store(CreateMatriculaRequest $request)
    {
        $input = $request->all();

        $matricula = $this->matriculaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/matriculas.singular')]));

        return redirect(route('matriculas.index'));
    }

    /**
     * Display the specified Matricula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        return view('matriculas.show')->with('matricula', $matricula);
    }

    /**
     * Show the form for editing the specified Matricula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        return view('matriculas.edit')->with('matricula', $matricula);
    }

    /**
     * Update the specified Matricula in storage.
     *
     * @param int $id
     * @param UpdateMatriculaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatriculaRequest $request)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        $matricula = $this->matriculaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/matriculas.singular')]));

        return redirect(route('matriculas.index'));
    }

    /**
     * Remove the specified Matricula from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matricula = $this->matriculaRepository->find($id);

        if (empty($matricula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matriculas.singular')]));

            return redirect(route('matriculas.index'));
        }

        $this->matriculaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/matriculas.singular')]));

        return redirect(route('matriculas.index'));
    }
}
