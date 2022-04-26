<?php

namespace App\Repositories;

use App\Models\tblnivel;
use App\Repositories\BaseRepository;

/**
 * Class tblnivelRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:47 am UTC
*/

class tblnivelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'niv_descripcion'
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
        return tblnivel::class;
    }
}
