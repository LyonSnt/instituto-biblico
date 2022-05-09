<?php

namespace App\Http\Controllers;

use App\DataTables\AsignaturaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Repositories\AsignaturaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\tblnivel;
use App\Models\tblprofesordato;
use App\Models\tblsexo;
use App\Models\tbltrimestre;
use Response;

class AsignaturaController extends AppBaseController
{
    /** @var AsignaturaRepository $asignaturaRepository*/
    private $asignaturaRepository;

    public function __construct(AsignaturaRepository $asignaturaRepo)
    {
        $this->asignaturaRepository = $asignaturaRepo;
    }

    /**
     * Display a listing of the Asignatura.
     *
     * @param AsignaturaDataTable $asignaturaDataTable
     *
     * @return Response
     */
    public function index(AsignaturaDataTable $asignaturaDataTable)
    {
        return $asignaturaDataTable->render('asignaturas.index');
    }

    /**
     * Show the form for creating a new Asignatura.
     *
     * @return Response
     */
    public function create()
    {


        $nivel = tblnivel::pluck('niv_descripcion', 'id');
        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        $trimestre = tbltrimestre::pluck('tri_descripcion', 'id');
        $profesor = tblprofesordato::pluck('pro_nombre', 'id');

        return view('asignaturas.create',compact('nivel', 'sexo', 'trimestre', 'profesor'));


    }

    /**
     * Store a newly created Asignatura in storage.
     *
     * @param CreateAsignaturaRequest $request
     *
     * @return Response
     */
    public function store(CreateAsignaturaRequest $request)
    {
        $input = $request->all();

        $asignatura = $this->asignaturaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/asignaturas.singular')]));

        return redirect(route('asignaturas.index'));
    }

    /**
     * Display the specified Asignatura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asignatura = $this->asignaturaRepository->find($id);

        if (empty($asignatura)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignaturas.singular')]));

            return redirect(route('asignaturas.index'));
        }

        return view('asignaturas.show')->with('asignatura', $asignatura);
    }

    /**
     * Show the form for editing the specified Asignatura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asignatura = $this->asignaturaRepository->find($id);

        if (empty($asignatura)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignaturas.singular')]));

            return redirect(route('asignaturas.index'));
        }

        return view('asignaturas.edit')->with('asignatura', $asignatura);
    }

    /**
     * Update the specified Asignatura in storage.
     *
     * @param int $id
     * @param UpdateAsignaturaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsignaturaRequest $request)
    {
        $asignatura = $this->asignaturaRepository->find($id);

        if (empty($asignatura)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignaturas.singular')]));

            return redirect(route('asignaturas.index'));
        }

        $asignatura = $this->asignaturaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/asignaturas.singular')]));

        return redirect(route('asignaturas.index'));
    }

    /**
     * Remove the specified Asignatura from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asignatura = $this->asignaturaRepository->find($id);

        if (empty($asignatura)) {
            Flash::error(__('messages.not_found', ['model' => __('models/asignaturas.singular')]));

            return redirect(route('asignaturas.index'));
        }

        $this->asignaturaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/asignaturas.singular')]));

        return redirect(route('asignaturas.index'));
    }
}
