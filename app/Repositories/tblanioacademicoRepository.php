<?php

namespace App\Repositories;

use App\Models\tblanioacademico;
use App\Repositories\BaseRepository;

/**
 * Class tblanioacademicoRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:56 am UTC
*/

class tblanioacademicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ani_anio'
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
        return tblanioacademico::class;
    }
}
