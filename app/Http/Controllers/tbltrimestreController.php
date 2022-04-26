<?php

namespace App\Http\Controllers;

use App\DataTables\tbltrimestreDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetbltrimestreRequest;
use App\Http\Requests\UpdatetbltrimestreRequest;
use App\Repositories\tbltrimestreRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tbltrimestreController extends AppBaseController
{
    /** @var  tbltrimestreRepository */
    private $tbltrimestreRepository;

    public function __construct(tbltrimestreRepository $tbltrimestreRepo)
    {
        $this->tbltrimestreRepository = $tbltrimestreRepo;
    }

    /**
     * Display a listing of the tbltrimestre.
     *
     * @param tbltrimestreDataTable $tbltrimestreDataTable
     * @return Response
     */
    public function index(tbltrimestreDataTable $tbltrimestreDataTable)
    {
        return $tbltrimestreDataTable->render('tbltrimestres.index');
    }

    /**
     * Show the form for creating a new tbltrimestre.
     *
     * @return Response
     */
    public function create()
    {
        return view('tbltrimestres.create');
    }

    /**
     * Store a newly created tbltrimestre in storage.
     *
     * @param CreatetbltrimestreRequest $request
     *
     * @return Response
     */
    public function store(CreatetbltrimestreRequest $request)
    {
        $input = $request->all();

        $tbltrimestre = $this->tbltrimestreRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tbltrimestres.singular')]));

        return redirect(route('tbltrimestres.index'));
    }

    /**
     * Display the specified tbltrimestre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tbltrimestre = $this->tbltrimestreRepository->find($id);

        if (empty($tbltrimestre)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbltrimestres.singular')]));

            return redirect(route('tbltrimestres.index'));
        }

        return view('tbltrimestres.show')->with('tbltrimestre', $tbltrimestre);
    }

    /**
     * Show the form for editing the specified tbltrimestre.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tbltrimestre = $this->tbltrimestreRepository->find($id);

        if (empty($tbltrimestre)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbltrimestres.singular')]));

            return redirect(route('tbltrimestres.index'));
        }

        return view('tbltrimestres.edit')->with('tbltrimestre', $tbltrimestre);
    }

    /**
     * Update the specified tbltrimestre in storage.
     *
     * @param  int              $id
     * @param UpdatetbltrimestreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetbltrimestreRequest $request)
    {
        $tbltrimestre = $this->tbltrimestreRepository->find($id);

        if (empty($tbltrimestre)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbltrimestres.singular')]));

            return redirect(route('tbltrimestres.index'));
        }

        $tbltrimestre = $this->tbltrimestreRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tbltrimestres.singular')]));

        return redirect(route('tbltrimestres.index'));
    }

    /**
     * Remove the specified tbltrimestre from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tbltrimestre = $this->tbltrimestreRepository->find($id);

        if (empty($tbltrimestre)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbltrimestres.singular')]));

            return redirect(route('tbltrimestres.index'));
        }

        $this->tbltrimestreRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tbltrimestres.singular')]));

        return redirect(route('tbltrimestres.index'));
    }
}
