<?php

namespace App\Http\Controllers;

use App\DataTables\tblinstitucionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblinstitucionRequest;
use App\Http\Requests\UpdatetblinstitucionRequest;
use App\Repositories\tblinstitucionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tblinstitucionController extends AppBaseController
{
    /** @var  tblinstitucionRepository */
    private $tblinstitucionRepository;

    public function __construct(tblinstitucionRepository $tblinstitucionRepo)
    {
        $this->tblinstitucionRepository = $tblinstitucionRepo;
    }

    /**
     * Display a listing of the tblinstitucion.
     *
     * @param tblinstitucionDataTable $tblinstitucionDataTable
     * @return Response
     */
    public function index(tblinstitucionDataTable $tblinstitucionDataTable)
    {
        return $tblinstitucionDataTable->render('tblinstitucions.index');
    }

    /**
     * Show the form for creating a new tblinstitucion.
     *
     * @return Response
     */
    public function create()
    {
        return view('tblinstitucions.create');
    }

    /**
     * Store a newly created tblinstitucion in storage.
     *
     * @param CreatetblinstitucionRequest $request
     *
     * @return Response
     */
    public function store(CreatetblinstitucionRequest $request)
    {
        $input = $request->all();

        $tblinstitucion = $this->tblinstitucionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblinstitucions.singular')]));

        return redirect(route('tblinstitucions.index'));
    }

    /**
     * Display the specified tblinstitucion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblinstitucion = $this->tblinstitucionRepository->find($id);

        if (empty($tblinstitucion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblinstitucions.singular')]));

            return redirect(route('tblinstitucions.index'));
        }

        return view('tblinstitucions.show')->with('tblinstitucion', $tblinstitucion);
    }

    /**
     * Show the form for editing the specified tblinstitucion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tblinstitucion = $this->tblinstitucionRepository->find($id);

        if (empty($tblinstitucion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblinstitucions.singular')]));

            return redirect(route('tblinstitucions.index'));
        }

        return view('tblinstitucions.edit')->with('tblinstitucion', $tblinstitucion);
    }

    /**
     * Update the specified tblinstitucion in storage.
     *
     * @param  int              $id
     * @param UpdatetblinstitucionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblinstitucionRequest $request)
    {
        $tblinstitucion = $this->tblinstitucionRepository->find($id);

        if (empty($tblinstitucion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblinstitucions.singular')]));

            return redirect(route('tblinstitucions.index'));
        }

        $tblinstitucion = $this->tblinstitucionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblinstitucions.singular')]));

        return redirect(route('tblinstitucions.index'));
    }

    /**
     * Remove the specified tblinstitucion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblinstitucion = $this->tblinstitucionRepository->find($id);

        if (empty($tblinstitucion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblinstitucions.singular')]));

            return redirect(route('tblinstitucions.index'));
        }

        $this->tblinstitucionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblinstitucions.singular')]));

        return redirect(route('tblinstitucions.index'));
    }
}
