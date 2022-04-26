<?php

namespace App\Http\Controllers;

use App\DataTables\tblprofesordatoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetblprofesordatoRequest;
use App\Http\Requests\UpdatetblprofesordatoRequest;
use App\Repositories\tblprofesordatoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\tblestadocivil;
use App\Models\tbliglesia;
use App\Models\tblsexo;
use Response;

class tblprofesordatoController extends AppBaseController
{
    /** @var tblprofesordatoRepository $tblprofesordatoRepository*/
    private $tblprofesordatoRepository;

    public function __construct(tblprofesordatoRepository $tblprofesordatoRepo)
    {
        $this->tblprofesordatoRepository = $tblprofesordatoRepo;
    }

    /**
     * Display a listing of the tblprofesordato.
     *
     * @param tblprofesordatoDataTable $tblprofesordatoDataTable
     *
     * @return Response
     */
    public function index(tblprofesordatoDataTable $tblprofesordatoDataTable)
    {
        return $tblprofesordatoDataTable->render('tblprofesordatos.index');
    }

    /**
     * Show the form for creating a new tblprofesordato.
     *
     * @return Response
     */
    public function create()
    {
        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        $estadocivil = tblestadocivil::pluck('esc_decripcion', 'id');
        $iglesia = tbliglesia::pluck('igl_nombre', 'id');
        return view('tblprofesordatos.create', compact('sexo', 'estadocivil', 'iglesia'));
    }

    /**
     * Store a newly created tblprofesordato in storage.
     *
     * @param CreatetblprofesordatoRequest $request
     *
     * @return Response
     */
    public function store(CreatetblprofesordatoRequest $request)
    {
        $input = $request->all();

        $request->validate([
            'pro_imagen' => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $input = $request->all();

        if($imagen = $request->file('pro_imagen')){
            $rutaGuardarImagen = 'imgprofesor/';
            $imagenEstudiante = date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenEstudiante);
            $input['pro_imagen'] = $imagenEstudiante;

        }

        $tblprofesordato = $this->tblprofesordatoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tblprofesordatos.singular')]));


        return redirect(route('tblprofesordatos.index'));
    }

    /**
     * Display the specified tblprofesordato.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tblprofesordato = $this->tblprofesordatoRepository->find($id);

        if (empty($tblprofesordato)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesordatos.singular')]));

            return redirect(route('tblprofesordatos.index'));
        }

        return view('tblprofesordatos.show')->with('tblprofesordato', $tblprofesordato);
    }

    /**
     * Show the form for editing the specified tblprofesordato.
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
        $tblprofesordato = $this->tblprofesordatoRepository->find($id);

        if (empty($tblprofesordato)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesordatos.singular')]));

            return redirect(route('tblprofesordatos.index'));
        }

        return view('tblprofesordatos.edit', compact('sexo', 'estadocivil', 'iglesia'))->with('tblprofesordato', $tblprofesordato);
    }

    /**
     * Update the specified tblprofesordato in storage.
     *
     * @param int $id
     * @param UpdatetblprofesordatoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetblprofesordatoRequest $request)
    {
        $tblprofesordato = $this->tblprofesordatoRepository->find($id);

        if (empty($tblprofesordato)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesordatos.singular')]));

            return redirect(route('tblprofesordatos.index'));
        }

        $tblprofesordato = $this->tblprofesordatoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tblprofesordatos.singular')]));

        return redirect(route('tblprofesordatos.index'));
    }

    /**
     * Remove the specified tblprofesordato from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tblprofesordato = $this->tblprofesordatoRepository->find($id);

        if (empty($tblprofesordato)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tblprofesordatos.singular')]));

            return redirect(route('tblprofesordatos.index'));
        }

        $this->tblprofesordatoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tblprofesordatos.singular')]));

        return redirect(route('tblprofesordatos.index'));
    }
}
