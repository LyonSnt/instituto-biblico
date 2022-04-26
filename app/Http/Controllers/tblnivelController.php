<?php

namespace App\Http\Controllers;

use App\DataTables\tblnivelDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblnivelRequest;
use App\Http\Requests\UpdatetblnivelRequest;
use App\Repositories\tblnivelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblnivelController extends AppBaseController
{
    /** @var  tblnivelRepository */
    private $tblnivelRepository;

    public function __construct(tblnivelRepository $tblnivelRepo)
    {
        $this->tblnivelRepository = $tblnivelRepo;
    }

    /**
     * Display a listing of the tblnivel.
     *
     * @param tblnivelDataTable $tblnivelDataTable
     * @return Response
     */
    public function index(tblnivelDataTable $tblnivelDataTable)
    {
        return $tblnivelDataTable->render('tblnivels.index');
    }

    /**
     * Show the form for creating a new tblnivel.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblnivels.create');
    }

    /**
     * Store a newly created tblnivel in storage.
     *
     * @param CreatetblnivelRequest $request
     *
     * @return Response
     */
    public function store(CreatetblnivelRequest $request)
    {
        $input = $request->all();

        $tblnivel = $this->tblnivelRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblnivels.singular')]));

        return redirect(route('tblnivels.index'));
    }

    /**
     * Display the specified tblnivel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblnivel = $this->tblnivelRepository->find($id);

        if (empty($tblnivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblnivels.singular')]));

            return redirect(route('tblnivels.index'));
        }

        return view('tblnivels.show')->with('tblnivel', $tblnivel);
    }

    /**
     * Show the form for editing the specified tblnivel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblnivel = $this->tblnivelRepository->find($id);

        if (empty($tblnivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblnivels.singular')]));

            return redirect(route('tblnivels.index'));
        }

        return view('tblnivels.edit')->with('tblnivel', $tblnivel);
    }

    /**
     * Update the specified tblnivel in storage.
     *
     * @param  int              $id
     * @param UpdatetblnivelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblnivelRequest $request)
    {
        $tblnivel = $this->tblnivelRepository->find($id);

        if (empty($tblnivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblnivels.singular')]));

            return redirect(route('tblnivels.index'));
        }

        $tblnivel = $this->tblnivelRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblnivels.singular')]));

        return redirect(route('tblnivels.index'));
    }

    /**
     * Remove the specified tblnivel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblnivel = $this->tblnivelRepository->find($id);

        if (empty($tblnivel)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblnivels.singular')]));

            return redirect(route('tblnivels.index'));
        }

        $this->tblnivelRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblnivels.singular')]));

        return redirect(route('tblnivels.index'));
    }
}
