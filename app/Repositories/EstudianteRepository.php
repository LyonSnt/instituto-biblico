<?php

namespace App\Repositories;

use App\Models\Estudiante;
use App\Repositories\BaseRepository;

/**
 * Class EstudianteRepository
 * @package App\Repositories
 * @version April 26, 2022, 3:39 pm -05
*/

class EstudianteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'est_cedula',
        'est_apellido',
        'est_nombre',
        'sex_id',
        'esc_id',
        'est_fechanacimiento',
        'est_fechabautismo',
        'est_celular',
        'est_direccion',
        'igl_id',
        'est_imagen'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estudiante::class;
    }
}
