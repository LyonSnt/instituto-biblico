<?php

namespace App\Http\Controllers;

use App\DataTables\EstudianteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Repositories\EstudianteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Estudiante;
use App\Models\tblestadocivil;
use App\Models\tbliglesia;
use App\Models\tblsexo;
use Response;
use File;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends AppBaseController
{
    /** @var EstudianteRepository $estudianteRepository*/
    private $estudianteRepository;

    public function __construct(EstudianteRepository $estudianteRepo)
    {
        $this->estudianteRepository = $estudianteRepo;
    }

    /**
     * Display a listing of the Estudiante.
     *
     * @param EstudianteDataTable $estudianteDataTable
     *
     * @return Response
     */
    public function index(EstudianteDataTable $estudianteDataTable)
    {
        return $estudianteDataTable->render('estudiantes.index');
    }

    /**
     * Show the form for creating a new Estudiante.
     *
     * @return Response
     */
    public function create( Estudiante $estudiante)
    {
        $sexo = tblsexo::pluck('sex_descripcion', 'id');
        $estadocivil = tblestadocivil::pluck('esc_decripcion', 'id');
        $iglesia = tbliglesia::pluck('igl_nombre', 'id');
        return view('estudiantes.create', compact('sexo', 'estadocivil', 'iglesia', 'estudiante'));
    }

    /**
     * Store a newly created Estudiante in storage.
     *
     * @param CreateEstudianteRequest $request
     *
     * @return Response
     */
    public function store(CreateEstudianteRequest $request)
    {

        $request->validate([
            'est_imagen' => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);

        $input = $request->all();

        if ($imagen = $request->file('est_imagen')) {
            $rutaGuardarImagen = 'imgestudiante/';
            $imagenEstudiante = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenEstudiante);
            $input['est_imagen'] = $imagenEstudiante;
        }

        $estudiante = $this->estudianteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estudiantes.singular')]));

        return redirect(route('estudiantes.index'));
    }

    /**
     * Display the specified Estudiante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estudiante = $this->estudianteRepository->find($id);

        if (empty($estudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estudiantes.singular')]));

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.show')->with('estudiante', $estudiante);
    }

    /**
     * Show the form for editing the specified Estudiante.
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
        $estudiante = $this->estudianteRepository->find($id);

        if (empty($estudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estudiantes.singular')]));

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.edit', compact('sexo', 'estadocivil', 'iglesia', 'estudiante'))->with('estudiante', $estudiante);
    }

    /**
     * Update the specified Estudiante in storage.
     *
     * @param int $id
     * @param UpdateEstudianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstudianteRequest $request)
    {
        $estudiante = $this->estudianteRepository->find($id);

        $request->validate([
            'est_imagen' => 'required|image|mimes:jpeg,jpg,png|max:1024'
        ]);
        if (empty($estudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estudiantes.singular')]));

            return redirect(route('estudiantes.index'));
        }



        $input = $request->all();

            if ($imagen = $request->file('est_imagen')) {
                $rutaGuardarImagen = 'imgestudiante/';
                $imagenEstudiante = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImagen, $imagenEstudiante);
                $input['est_imagen'] = $imagenEstudiante;

                $estudiante->est_imagen=$imagenEstudiante;

            } else {
                unset($input['est_imagen']);  /* TODO ESTE CODIGO ES PARA QUE NO SE EDITE LA FOTO */
            }

            if (!empty($estudiante->est_imagen)) {
                $path = public_path('imgestudiante/') . $estudiante->est_imagen;
                unlink($path);
            }else {
                unset($input['est_imagen']);  /* TODO ESTE CODIGO ES PARA QUE NO SE EDITE LA FOTO */
            }



        /*    $estudiante = $this->estudianteRepository->update($request->all(), $id);
 */
        $estudiante = $this->estudianteRepository->update($input, $id);
        Flash::success(__('messages.updated', ['model' => __('models/estudiantes.singular')]));

        return redirect(route('estudiantes.index'));




        /*    $trabajador=Trabajador::findOrFail($id);
    $this->authorize('update', $trabajador); */
        /*  if($request->hasFile('est_imagen')){
        // aquí compruebo que exista la foto anterior
        if (\Storage::exists($estudiante->est_imagen))
        {
             // aquí la borro
             \Storage::delete($estudiante->est_imagen);
        }
        $estudiante->est_imagen=\Storage::putFile('public', $request->file('est_imagen'));
    }
    $estudiante->update($request->only('nombre','correo'));
    $estudiante->roles()->sync($request->roles);
    return back()->with('info', 'Usuario Actualizado'); */
    }

    /**
     * Remove the specified Estudiante from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estudiante = $this->estudianteRepository->find($id);

        if (empty($estudiante)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estudiantes.singular')]));

            return redirect(route('estudiantes.index'));
        }

        $this->estudianteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estudiantes.singular')]));

        return redirect(route('estudiantes.index'));
    }
}
