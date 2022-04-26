<?php

namespace App\Http\Controllers;

use App\DataTables\tblsexoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblsexoRequest;
use App\Http\Requests\UpdatetblsexoRequest;
use App\Repositories\tblsexoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblsexoController extends AppBaseController
{
    /** @var  tblsexoRepository */
    private $tblsexoRepository;

    public function __construct(tblsexoRepository $tblsexoRepo)
    {
        $this->tblsexoRepository = $tblsexoRepo;
    }

    /**
     * Display a listing of the tblsexo.
     *
     * @param tblsexoDataTable $tblsexoDataTable
     * @return Response
     */
    public function index(tblsexoDataTable $tblsexoDataTable)
    {
        return $tblsexoDataTable->render('tblsexos.index');
    }

    /**
     * Show the form for creating a new tblsexo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblsexos.create');
    }

    /**
     * Store a newly created tblsexo in storage.
     *
     * @param CreatetblsexoRequest $request
     *
     * @return Response
     */
    public function store(CreatetblsexoRequest $request)
    {
        $input = $request->all();

        $tblsexo = $this->tblsexoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblsexos.singular')]));

        return redirect(route('tblsexos.index'));
    }

    /**
     * Display the specified tblsexo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblsexo = $this->tblsexoRepository->find($id);

        if (empty($tblsexo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblsexos.singular')]));

            return redirect(route('tblsexos.index'));
        }

        return view('tblsexos.show')->with('tblsexo', $tblsexo);
    }

    /**
     * Show the form for editing the specified tblsexo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblsexo = $this->tblsexoRepository->find($id);

        if (empty($tblsexo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblsexos.singular')]));

            return redirect(route('tblsexos.index'));
        }

        return view('tblsexos.edit')->with('tblsexo', $tblsexo);
    }

    /**
     * Update the specified tblsexo in storage.
     *
     * @param  int              $id
     * @param UpdatetblsexoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblsexoRequest $request)
    {
        $tblsexo = $this->tblsexoRepository->find($id);

        if (empty($tblsexo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblsexos.singular')]));

            return redirect(route('tblsexos.index'));
        }

        $tblsexo = $this->tblsexoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblsexos.singular')]));

        return redirect(route('tblsexos.index'));
    }

    /**
     * Remove the specified tblsexo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblsexo = $this->tblsexoRepository->find($id);

        if (empty($tblsexo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblsexos.singular')]));

            return redirect(route('tblsexos.index'));
        }

        $this->tblsexoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblsexos.singular')]));

        return redirect(route('tblsexos.index'));
    }
}
