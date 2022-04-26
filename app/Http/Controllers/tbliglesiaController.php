<?php

namespace App\Http\Controllers;

use App\DataTables\tbliglesiaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetbliglesiaRequest;
use App\Http\Requests\UpdatetbliglesiaRequest;
use App\Repositories\tbliglesiaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tbliglesiaController extends AppBaseController
{
    /** @var  tbliglesiaRepository */
    private $tbliglesiaRepository;

    public function __construct(tbliglesiaRepository $tbliglesiaRepo)
    {
        $this->tbliglesiaRepository = $tbliglesiaRepo;
    }

    /**
     * Display a listing of the tbliglesia.
     *
     * @param tbliglesiaDataTable $tbliglesiaDataTable
     * @return Response
     */
    public function index(tbliglesiaDataTable $tbliglesiaDataTable)
    {
        return $tbliglesiaDataTable->render('tbliglesias.index');
    }

    /**
     * Show the form for creating a new tbliglesia.
     *
     * @return Response
     */
    public function create()
    {
        return view('tbliglesias.create');
    }

    /**
     * Store a newly created tbliglesia in storage.
     *
     * @param CreatetbliglesiaRequest $request
     *
     * @return Response
     */
    public function store(CreatetbliglesiaRequest $request)
    {
        $input = $request->all();

        $tbliglesia = $this->tbliglesiaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tbliglesias.singular')]));

        return redirect(route('tbliglesias.index'));
    }

    /**
     * Display the specified tbliglesia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tbliglesia = $this->tbliglesiaRepository->find($id);

        if (empty($tbliglesia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbliglesias.singular')]));

            return redirect(route('tbliglesias.index'));
        }

        return view('tbliglesias.show')->with('tbliglesia', $tbliglesia);
    }

    /**
     * Show the form for editing the specified tbliglesia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tbliglesia = $this->tbliglesiaRepository->find($id);

        if (empty($tbliglesia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbliglesias.singular')]));

            return redirect(route('tbliglesias.index'));
        }

        return view('tbliglesias.edit')->with('tbliglesia', $tbliglesia);
    }

    /**
     * Update the specified tbliglesia in storage.
     *
     * @param  int              $id
     * @param UpdatetbliglesiaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetbliglesiaRequest $request)
    {
        $tbliglesia = $this->tbliglesiaRepository->find($id);

        if (empty($tbliglesia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbliglesias.singular')]));

            return redirect(route('tbliglesias.index'));
        }

        $tbliglesia = $this->tbliglesiaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tbliglesias.singular')]));

        return redirect(route('tbliglesias.index'));
    }

    /**
     * Remove the specified tbliglesia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tbliglesia = $this->tbliglesiaRepository->find($id);

        if (empty($tbliglesia)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbliglesias.singular')]));

            return redirect(route('tbliglesias.index'));
        }

        $this->tbliglesiaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tbliglesias.singular')]));

        return redirect(route('tbliglesias.index'));
    }
}
