<?php

namespace App\Repositories;

use App\Models\tblaula;
use App\Repositories\BaseRepository;

/**
 * Class tblaulaRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:52 am UTC
*/

class tblaulaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'aul_nombre'
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
        return tblaula::class;
    }
}
