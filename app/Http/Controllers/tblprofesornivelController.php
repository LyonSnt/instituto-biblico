<?php

namespace App\Http\Controllers;

use App\DataTables\tblprofesornivelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblprofesornivelRequest;
use App\Http\Requests\UpdatetblprofesornivelRequest;
use App\Repositories\tblprofesornivelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\tblnivel;
use App\Models\tblprofesordato;
use App\Models\tblsexo;
use Response;

class tblprofesornivelController extends AppBaseController
{
    /** @var tblprofesornivelRepository $tblprofesornivelRepository*/
    private $tblprofesornivelRepository;

    public function __construct(tblprofesornivelRepository $tblprofesornivelRepo)
    {
        $this->tblprofesornivelRepository = $tblprofesornivelRepo;
    }

    /**
     * Display a listing of the tblprofesornivel.
     *
     * @param tblprofesornivelDataTable $tblprofesornivelDataTable
     *
     * @return Response
     */
    public function index(tblprofesornivelDataTable $tblprofesornivelDataTable)
    {
        return $tblprofesornivelDataTable->render('tblprofesornivels.index');
    }

    /**
     * Show the form for creating a new tblprofesornivel.
     *
     * @return Response
     */
    public function create()
    {
        $profdato = tblprofesordato::pluck('pro_nombre', 'id');
        $nivel = tblnivel::pluck('niv_descripcion', 'id');
        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        return view('tblprofesornivels.create', compact('profdato', 'nivel', 'sexo'));
    }

    /**
     * Store a newly created tblprofesornivel in storage.
     *
     * @param CreatetblprofesornivelRequest $request
     *
     * @return Response
     */
    public function store(CreatetblprofesornivelRequest $request)
    {
        $input = $request->all();

        $tblprofesornivel = $this->tblprofesornivelRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblprofesornivels.singular')]));

        return redirect(route('tblprofesornivels.index'));
    }

    /**
     * Display the specified tblprofesornivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblprofesornivel = $this->tblprofesornivelRepository->find($id);

        if (empty($tblprofesornivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesornivels.singular')]));

            return redirect(route('tblprofesornivels.index'));
        }

        return view('tblprofesornivels.show')->with('tblprofesornivel', $tblprofesornivel);
    }

    /**
     * Show the form for editing the specified tblprofesornivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblprofesornivel = $this->tblprofesornivelRepository->find($id);

        if (empty($tblprofesornivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesornivels.singular')]));

            return redirect(route('tblprofesornivels.index'));
        }

        return view('tblprofesornivels.edit')->with('tblprofesornivel', $tblprofesornivel);
    }

    /**
     * Update the specified tblprofesornivel in storage.
     *
     * @param int $id
     * @param UpdatetblprofesornivelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblprofesornivelRequest $request)
    {
        $tblprofesornivel = $this->tblprofesornivelRepository->find($id);

        if (empty($tblprofesornivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesornivels.singular')]));

            return redirect(route('tblprofesornivels.index'));
        }

        $tblprofesornivel = $this->tblprofesornivelRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblprofesornivels.singular')]));

        return redirect(route('tblprofesornivels.index'));
    }

    /**
     * Remove the specified tblprofesornivel from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblprofesornivel = $this->tblprofesornivelRepository->find($id);

        if (empty($tblprofesornivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesornivels.singular')]));

            return redirect(route('tblprofesornivels.index'));
        }

        $this->tblprofesornivelRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblprofesornivels.singular')]));

        return redirect(route('tblprofesornivels.index'));
    }
}
