<?php

namespace App\Repositories;

use App\Models\tblinstitucion;
use App\Repositories\BaseRepository;

/**
 * Class tblinstitucionRepository
 * @package App\Repositories
 * @version April 21, 2022, 2:10 am UTC
*/

class tblinstitucionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ins_nombre',
        'ins_direccion',
        'ins_telefono',
        'ins_correo'
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
        return tblinstitucion::class;
    }
}
