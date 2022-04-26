<?php

namespace App\Repositories;

use App\Models\tblcargo;
use App\Repositories\BaseRepository;

/**
 * Class tblcargoRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:02 am UTC
*/

class tblcargoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'car_descripcion'
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
        return tblcargo::class;
    }
}
