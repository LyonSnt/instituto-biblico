<?php

namespace App\Http\Controllers;

use App\DataTables\tblanioacademicoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblanioacademicoRequest;
use App\Http\Requests\UpdatetblanioacademicoRequest;
use App\Repositories\tblanioacademicoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblanioacademicoController extends AppBaseController
{
    /** @var  tblanioacademicoRepository */
    private $tblanioacademicoRepository;

    public function __construct(tblanioacademicoRepository $tblanioacademicoRepo)
    {
        $this->tblanioacademicoRepository = $tblanioacademicoRepo;
    }

    /**
     * Display a listing of the tblanioacademico.
     *
     * @param tblanioacademicoDataTable $tblanioacademicoDataTable
     * @return Response
     */
    public function index(tblanioacademicoDataTable $tblanioacademicoDataTable)
    {
        return $tblanioacademicoDataTable->render('tblanioacademicos.index');
    }

    /**
     * Show the form for creating a new tblanioacademico.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblanioacademicos.create');
    }

    /**
     * Store a newly created tblanioacademico in storage.
     *
     * @param CreatetblanioacademicoRequest $request
     *
     * @return Response
     */
    public function store(CreatetblanioacademicoRequest $request)
    {
        $input = $request->all();

        $tblanioacademico = $this->tblanioacademicoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblanioacademicos.singular')]));

        return redirect(route('tblanioacademicos.index'));
    }

    /**
     * Display the specified tblanioacademico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblanioacademico = $this->tblanioacademicoRepository->find($id);

        if (empty($tblanioacademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblanioacademicos.singular')]));

            return redirect(route('tblanioacademicos.index'));
        }

        return view('tblanioacademicos.show')->with('tblanioacademico', $tblanioacademico);
    }

    /**
     * Show the form for editing the specified tblanioacademico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblanioacademico = $this->tblanioacademicoRepository->find($id);

        if (empty($tblanioacademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblanioacademicos.singular')]));

            return redirect(route('tblanioacademicos.index'));
        }

        return view('tblanioacademicos.edit')->with('tblanioacademico', $tblanioacademico);
    }

    /**
     * Update the specified tblanioacademico in storage.
     *
     * @param  int              $id
     * @param UpdatetblanioacademicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblanioacademicoRequest $request)
    {
        $tblanioacademico = $this->tblanioacademicoRepository->find($id);

        if (empty($tblanioacademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblanioacademicos.singular')]));

            return redirect(route('tblanioacademicos.index'));
        }

        $tblanioacademico = $this->tblanioacademicoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblanioacademicos.singular')]));

        return redirect(route('tblanioacademicos.index'));
    }

    /**
     * Remove the specified tblanioacademico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblanioacademico = $this->tblanioacademicoRepository->find($id);

        if (empty($tblanioacademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblanioacademicos.singular')]));

            return redirect(route('tblanioacademicos.index'));
        }

        $this->tblanioacademicoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblanioacademicos.singular')]));

        return redirect(route('tblanioacademicos.index'));
    }
}
