<?php

namespace App\Http\Controllers;

use App\DataTables\tblestadocivilDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblestadocivilRequest;
use App\Http\Requests\UpdatetblestadocivilRequest;
use App\Repositories\tblestadocivilRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblestadocivilController extends AppBaseController
{
    /** @var  tblestadocivilRepository */
    private $tblestadocivilRepository;

    public function __construct(tblestadocivilRepository $tblestadocivilRepo)
    {
        $this->tblestadocivilRepository = $tblestadocivilRepo;
    }

    /**
     * Display a listing of the tblestadocivil.
     *
     * @param tblestadocivilDataTable $tblestadocivilDataTable
     * @return Response
     */
    public function index(tblestadocivilDataTable $tblestadocivilDataTable)
    {
        return $tblestadocivilDataTable->render('tblestadocivils.index');
    }

    /**
     * Show the form for creating a new tblestadocivil.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblestadocivils.create');
    }

    /**
     * Store a newly created tblestadocivil in storage.
     *
     * @param CreatetblestadocivilRequest $request
     *
     * @return Response
     */
    public function store(CreatetblestadocivilRequest $request)
    {
        $input = $request->all();

        $tblestadocivil = $this->tblestadocivilRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblestadocivils.singular')]));

        return redirect(route('tblestadocivils.index'));
    }

    /**
     * Display the specified tblestadocivil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblestadocivil = $this->tblestadocivilRepository->find($id);

        if (empty($tblestadocivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestadocivils.singular')]));

            return redirect(route('tblestadocivils.index'));
        }

        return view('tblestadocivils.show')->with('tblestadocivil', $tblestadocivil);
    }

    /**
     * Show the form for editing the specified tblestadocivil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblestadocivil = $this->tblestadocivilRepository->find($id);

        if (empty($tblestadocivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestadocivils.singular')]));

            return redirect(route('tblestadocivils.index'));
        }

        return view('tblestadocivils.edit')->with('tblestadocivil', $tblestadocivil);
    }

    /**
     * Update the specified tblestadocivil in storage.
     *
     * @param  int              $id
     * @param UpdatetblestadocivilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblestadocivilRequest $request)
    {
        $tblestadocivil = $this->tblestadocivilRepository->find($id);

        if (empty($tblestadocivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestadocivils.singular')]));

            return redirect(route('tblestadocivils.index'));
        }

        $tblestadocivil = $this->tblestadocivilRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblestadocivils.singular')]));

        return redirect(route('tblestadocivils.index'));
    }

    /**
     * Remove the specified tblestadocivil from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblestadocivil = $this->tblestadocivilRepository->find($id);

        if (empty($tblestadocivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestadocivils.singular')]));

            return redirect(route('tblestadocivils.index'));
        }

        $this->tblestadocivilRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblestadocivils.singular')]));

        return redirect(route('tblestadocivils.index'));
    }
}
