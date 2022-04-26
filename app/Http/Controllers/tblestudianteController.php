<?php

namespace App\Http\Controllers;

use App\DataTables\tblestudianteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblestudianteRequest;
use App\Http\Requests\UpdatetblestudianteRequest;
use App\Repositories\tblestudianteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\tblestadocivil;
use App\Models\tbliglesia;
use App\Models\tblsexo;
use Response;

class tblestudianteController extends AppBaseController
{
    /** @var tblestudianteRepository $tblestudianteRepository*/
    private $tblestudianteRepository;

    public function __construct(tblestudianteRepository $tblestudianteRepo)
    {
        $this->tblestudianteRepository = $tblestudianteRepo;
    }

    /**
     * Display a listing of the tblestudiante.
     *
     * @param tblestudianteDataTable $tblestudianteDataTable
     *
     * @return Response
     */
    public function index(tblestudianteDataTable $tblestudianteDataTable)
    {
        return $tblestudianteDataTable->render('tblestudiantes.index');
    }

    /**
     * Show the form for creating a new tblestudiante.
     *
     * @return Response
     */
    public function create()
    {

        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        $estadocivil = tblestadocivil::pluck('esc_decripcion', 'id');
        $iglesia = tbliglesia::pluck('igl_nombre', 'id');
        return view('tblestudiantes.create', compact('sexo', 'estadocivil', 'iglesia'));

    }

    /**
     * Store a newly created tblestudiante in storage.
     *
     * @param CreatetblestudianteRequest $request
     *
     * @return Response
     */
    public function store(CreatetblestudianteRequest $request)
    {
        $input = $request->all();

        $tblestudiante = $this->tblestudianteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblestudiantes.singular')]));

        return redirect(route('tblestudiantes.index'));
    }

    /**
     * Display the specified tblestudiante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblestudiante = $this->tblestudianteRepository->find($id);

        if (empty($tblestudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestudiantes.singular')]));

            return redirect(route('tblestudiantes.index'));
        }

        return view('tblestudiantes.show')->with('tblestudiante', $tblestudiante);
    }

    /**
     * Show the form for editing the specified tblestudiante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        $estadocivil = tblestadocivil::pluck('esc_decripcion', 'id');
        $iglesia = tbliglesia::pluck('igl_nombre', 'id');

        $tblestudiante = $this->tblestudianteRepository->find($id);

        if (empty($tblestudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestudiantes.singular')]));

            return redirect(route('tblestudiantes.index'));
        }


        return view('tblestudiantes.edit', compact('sexo', 'estadocivil', 'iglesia'))->with('tblestudiante', $tblestudiante);
    }

    /**
     * Update the specified tblestudiante in storage.
     *
     * @param int $id
     * @param UpdatetblestudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblestudianteRequest $request)
    {
        $tblestudiante = $this->tblestudianteRepository->find($id);

        if (empty($tblestudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestudiantes.singular')]));

            return redirect(route('tblestudiantes.index'));
        }

        $tblestudiante = $this->tblestudianteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblestudiantes.singular')]));

        return redirect(route('tblestudiantes.index'));
    }

    /**
     * Remove the specified tblestudiante from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblestudiante = $this->tblestudianteRepository->find($id);

        if (empty($tblestudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblestudiantes.singular')]));

            return redirect(route('tblestudiantes.index'));
        }

        $this->tblestudianteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblestudiantes.singular')]));

        return redirect(route('tblestudiantes.index'));
    }
}
