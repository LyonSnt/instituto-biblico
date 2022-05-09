<?php

namespace App\Http\Controllers;

use App\DataTables\MesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMesRequest;
use App\Http\Requests\UpdateMesRequest;
use App\Repositories\MesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MesController extends AppBaseController
{
    /** @var MesRepository $mesRepository*/
    private $mesRepository;

    public function __construct(MesRepository $mesRepo)
    {
        $this->mesRepository = $mesRepo;
    }

    /**
     * Display a listing of the Mes.
     *
     * @param MesDataTable $mesDataTable
     *
     * @return Response
     */
    public function index(MesDataTable $mesDataTable)
    {
        return $mesDataTable->render('mes.index');
    }

    /**
     * Show the form for creating a new Mes.
     *
     * @return Response
     */
    public function create()
    {
        return view('mes.create');
    }

    /**
     * Store a newly created Mes in storage.
     *
     * @param CreateMesRequest $request
     *
     * @return Response
     */
    public function store(CreateMesRequest $request)
    {
        $input = $request->all();

        $mes = $this->mesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/mes.singular')]));

        return redirect(route('mes.index'));
    }

    /**
     * Display the specified Mes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mes = $this->mesRepository->find($id);

        if (empty($mes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mes.singular')]));

            return redirect(route('mes.index'));
        }

        return view('mes.show')->with('mes', $mes);
    }

    /**
     * Show the form for editing the specified Mes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mes = $this->mesRepository->find($id);

        if (empty($mes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mes.singular')]));

            return redirect(route('mes.index'));
        }

        return view('mes.edit')->with('mes', $mes);
    }

    /**
     * Update the specified Mes in storage.
     *
     * @param int $id
     * @param UpdateMesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMesRequest $request)
    {
        $mes = $this->mesRepository->find($id);

        if (empty($mes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mes.singular')]));

            return redirect(route('mes.index'));
        }

        $mes = $this->mesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/mes.singular')]));

        return redirect(route('mes.index'));
    }

    /**
     * Remove the specified Mes from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mes = $this->mesRepository->find($id);

        if (empty($mes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mes.singular')]));

            return redirect(route('mes.index'));
        }

        $this->mesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/mes.singular')]));

        return redirect(route('mes.index'));
    }
}
