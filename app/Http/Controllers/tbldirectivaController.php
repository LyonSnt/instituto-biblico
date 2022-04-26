<?php

namespace App\Http\Controllers;

use App\DataTables\tbldirectivaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetbldirectivaRequest;
use App\Http\Requests\UpdatetbldirectivaRequest;
use App\Repositories\tbldirectivaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\tblcargo;
use App\Models\tblprofesordato;
use App\Models\tblsexo;
use Response;

class tbldirectivaController extends AppBaseController
{
    /** @var tbldirectivaRepository $tbldirectivaRepository*/
    private $tbldirectivaRepository;

    public function __construct(tbldirectivaRepository $tbldirectivaRepo)
    {
        $this->tbldirectivaRepository = $tbldirectivaRepo;
    }

    /**
     * Display a listing of the tbldirectiva.
     *
     * @param tbldirectivaDataTable $tbldirectivaDataTable
     *
     * @return Response
     */
    public function index(tbldirectivaDataTable $tbldirectivaDataTable)
    {
        return $tbldirectivaDataTable->render('tbldirectivas.index');
    }

    /**
     * Show the form for creating a new tbldirectiva.
     *
     * @return Response
     */
    public function create()
    {

        $cargo = tblcargo::pluck('car_descripcion', 'id');
        $profdato = tblprofesordato::pluck('pro_nombre', 'id');
        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        return view('tbldirectivas.create', compact('cargo', 'profdato', 'sexo'));
    }

    /**
     * Store a newly created tbldirectiva in storage.
     *
     * @param CreatetbldirectivaRequest $request
     *
     * @return Response
     */
    public function store(CreatetbldirectivaRequest $request)
    {
        $input = $request->all();

        $tbldirectiva = $this->tbldirectivaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tbldirectivas.singular')]));

        return redirect(route('tbldirectivas.index'));
    }

    /**
     * Display the specified tbldirectiva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tbldirectiva = $this->tbldirectivaRepository->find($id);

        if (empty($tbldirectiva)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbldirectivas.singular')]));

            return redirect(route('tbldirectivas.index'));
        }

        return view('tbldirectivas.show')->with('tbldirectiva', $tbldirectiva);
    }

    /**
     * Show the form for editing the specified tbldirectiva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $cargo = tblcargo::pluck('car_descripcion', 'id');
        $profdato = tblprofesordato::pluck('pro_nombre', 'id');
        $sexo = tblsexo::pluck('sex_id', 'id');
        $tbldirectiva = $this->tbldirectivaRepository->find($id);

        if (empty($tbldirectiva)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbldirectivas.singular')]));

            return redirect(route('tbldirectivas.index'));
        }

        return view('tbldirectivas.edit',compact('cargo', 'profdato', 'sexo'))->with('tbldirectiva', $tbldirectiva);
    }

    /**
     * Update the specified tbldirectiva in storage.
     *
     * @param int $id
     * @param UpdatetbldirectivaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetbldirectivaRequest $request)
    {
        $tbldirectiva = $this->tbldirectivaRepository->find($id);

        if (empty($tbldirectiva)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbldirectivas.singular')]));

            return redirect(route('tbldirectivas.index'));
        }

        $tbldirectiva = $this->tbldirectivaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tbldirectivas.singular')]));

        return redirect(route('tbldirectivas.index'));
    }

    /**
     * Remove the specified tbldirectiva from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tbldirectiva = $this->tbldirectivaRepository->find($id);

        if (empty($tbldirectiva)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tbldirectivas.singular')]));

            return redirect(route('tbldirectivas.index'));
        }

        $this->tbldirectivaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tbldirectivas.singular')]));

        return redirect(route('tbldirectivas.index'));
    }
}
