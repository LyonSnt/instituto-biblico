<?php

namespace App\Repositories;

use App\Models\tblestudiante;
use App\Repositories\BaseRepository;

/**
 * Class tblestudianteRepository
 * @package App\Repositories
 * @version April 22, 2022, 5:33 pm -05
*/

class tblestudianteRepository extends BaseRepository
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
        'igl_id'
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
        return tblestudiante::class;
    }
}
