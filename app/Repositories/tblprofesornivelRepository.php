<?php

namespace App\Repositories;

use App\Models\tblprofesornivel;
use App\Repositories\BaseRepository;

/**
 * Class tblprofesornivelRepository
 * @package App\Repositories
 * @version April 22, 2022, 6:06 pm -05
*/

class tblprofesornivelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'niv_id',
        'sex_id'
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
        return tblprofesornivel::class;
    }
}
