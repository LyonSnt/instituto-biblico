<?php

namespace App\Http\Controllers;

use App\DataTables\tblaulaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblaulaRequest;
use App\Http\Requests\UpdatetblaulaRequest;
use App\Repositories\tblaulaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblaulaController extends AppBaseController
{
    /** @var  tblaulaRepository */
    private $tblaulaRepository;

    public function __construct(tblaulaRepository $tblaulaRepo)
    {
        $this->tblaulaRepository = $tblaulaRepo;
    }

    /**
     * Display a listing of the tblaula.
     *
     * @param tblaulaDataTable $tblaulaDataTable
     * @return Response
     */
    public function index(tblaulaDataTable $tblaulaDataTable)
    {
        return $tblaulaDataTable->render('tblaulas.index');
    }

    /**
     * Show the form for creating a new tblaula.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblaulas.create');
    }

    /**
     * Store a newly created tblaula in storage.
     *
     * @param CreatetblaulaRequest $request
     *
     * @return Response
     */
    public function store(CreatetblaulaRequest $request)
    {
        $input = $request->all();

        $tblaula = $this->tblaulaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblaulas.singular')]));

        return redirect(route('tblaulas.index'));
    }

    /**
     * Display the specified tblaula.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblaula = $this->tblaulaRepository->find($id);

        if (empty($tblaula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblaulas.singular')]));

            return redirect(route('tblaulas.index'));
        }

        return view('tblaulas.show')->with('tblaula', $tblaula);
    }

    /**
     * Show the form for editing the specified tblaula.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblaula = $this->tblaulaRepository->find($id);

        if (empty($tblaula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblaulas.singular')]));

            return redirect(route('tblaulas.index'));
        }

        return view('tblaulas.edit')->with('tblaula', $tblaula);
    }

    /**
     * Update the specified tblaula in storage.
     *
     * @param  int              $id
     * @param UpdatetblaulaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblaulaRequest $request)
    {
        $tblaula = $this->tblaulaRepository->find($id);

        if (empty($tblaula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblaulas.singular')]));

            return redirect(route('tblaulas.index'));
        }

        $tblaula = $this->tblaulaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblaulas.singular')]));

        return redirect(route('tblaulas.index'));
    }

    /**
     * Remove the specified tblaula from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblaula = $this->tblaulaRepository->find($id);

        if (empty($tblaula)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblaulas.singular')]));

            return redirect(route('tblaulas.index'));
        }

        $this->tblaulaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblaulas.singular')]));

        return redirect(route('tblaulas.index'));
    }
}
