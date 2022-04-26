<?php

namespace App\Repositories;

use App\Models\tblestadocivil;
use App\Repositories\BaseRepository;

/**
 * Class tblestadocivilRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:05 am UTC
*/

class tblestadocivilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'esc_decripcion'
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
        return tblestadocivil::class;
    }
}
