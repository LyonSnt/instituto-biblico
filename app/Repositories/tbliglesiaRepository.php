<?php

namespace App\Repositories;

use App\Models\tbliglesia;
use App\Repositories\BaseRepository;

/**
 * Class tbliglesiaRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:50 am UTC
*/

class tbliglesiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'igl_nombre',
        'igl_direccion',
        'igl_telefono',
        'igl_correo'
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
        return tbliglesia::class;
    }
}
