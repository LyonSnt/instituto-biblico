<?php

namespace App\Repositories;

use App\Models\tblprofesordato;
use App\Repositories\BaseRepository;

/**
 * Class tblprofesordatoRepository
 * @package App\Repositories
 * @version April 22, 2022, 9:33 pm -05
*/

class tblprofesordatoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pro_cedula',
        'pro_apellido',
        'pro_nombre',
        'sex_id',
        'esc_id',
        'pro_fechanacimiento',
        'pro_fechabautismo',
        'pro_celular',
        'pro_direccion',
        'igl_id',
        'pro_imagen'
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
        return tblprofesordato::class;
    }
}
