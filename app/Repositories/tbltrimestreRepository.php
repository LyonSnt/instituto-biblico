<?php

namespace App\Repositories;

use App\Models\tbltrimestre;
use App\Repositories\BaseRepository;

/**
 * Class tbltrimestreRepository
 * @package App\Repositories
 * @version April 20, 2022, 8:52 pm UTC
*/

class tbltrimestreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tri_descripcion'
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
        return tbltrimestre::class;
    }
}
