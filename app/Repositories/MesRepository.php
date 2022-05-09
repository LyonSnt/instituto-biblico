<?php

namespace App\Repositories;

use App\Models\Mes;
use App\Repositories\BaseRepository;

/**
 * Class MesRepository
 * @package App\Repositories
 * @version May 9, 2022, 12:28 pm -05
*/

class MesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mes_nombre'
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
        return Mes::class;
    }
}
