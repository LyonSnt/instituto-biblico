<?php

namespace App\Http\Controllers;

use App\DataTables\tblcargoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblcargoRequest;
use App\Http\Requests\UpdatetblcargoRequest;
use App\Repositories\tblcargoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblcargoController extends AppBaseController
{
    /** @var  tblcargoRepository */
    private $tblcargoRepository;

    public function __construct(tblcargoRepository $tblcargoRepo)
    {
        $this->tblcargoRepository = $tblcargoRepo;
    }

    /**
     * Display a listing of the tblcargo.
     *
     * @param tblcargoDataTable $tblcargoDataTable
     * @return Response
     */
    public function index(tblcargoDataTable $tblcargoDataTable)
    {
        return $tblcargoDataTable->render('tblcargos.index');
    }

    /**
     * Show the form for creating a new tblcargo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblcargos.create');
    }

    /**
     * Store a newly created tblcargo in storage.
     *
     * @param CreatetblcargoRequest $request
     *
     * @return Response
     */
    public function store(CreatetblcargoRequest $request)
    {
        $input = $request->all();

        $tblcargo = $this->tblcargoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblcargos.singular')]));

        return redirect(route('tblcargos.index'));
    }

    /**
     * Display the specified tblcargo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblcargo = $this->tblcargoRepository->find($id);

        if (empty($tblcargo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblcargos.singular')]));

            return redirect(route('tblcargos.index'));
        }

        return view('tblcargos.show')->with('tblcargo', $tblcargo);
    }

    /**
     * Show the form for editing the specified tblcargo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblcargo = $this->tblcargoRepository->find($id);

        if (empty($tblcargo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblcargos.singular')]));

            return redirect(route('tblcargos.index'));
        }

        return view('tblcargos.edit')->with('tblcargo', $tblcargo);
    }

    /**
     * Update the specified tblcargo in storage.
     *
     * @param  int              $id
     * @param UpdatetblcargoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblcargoRequest $request)
    {
        $tblcargo = $this->tblcargoRepository->find($id);

        if (empty($tblcargo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblcargos.singular')]));

            return redirect(route('tblcargos.index'));
        }

        $tblcargo = $this->tblcargoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblcargos.singular')]));

        return redirect(route('tblcargos.index'));
    }

    /**
     * Remove the specified tblcargo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblcargo = $this->tblcargoRepository->find($id);

        if (empty($tblcargo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblcargos.singular')]));

            return redirect(route('tblcargos.index'));
        }

        $this->tblcargoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblcargos.singular')]));

        return redirect(route('tblcargos.index'));
    }
}
