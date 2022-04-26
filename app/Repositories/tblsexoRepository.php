<?php

namespace App\Repositories;

use App\Models\tblsexo;
use App\Repositories\BaseRepository;

/**
 * Class tblsexoRepository
 * @package App\Repositories
 * @version April 21, 2022, 1:46 am UTC
*/

class tblsexoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sex_descripcion'
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
        return tblsexo::class;
    }
}
