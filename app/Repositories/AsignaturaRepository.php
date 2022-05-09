<?php

namespace App\Repositories;

use App\Models\Asignatura;
use App\Repositories\BaseRepository;

/**
 * Class AsignaturaRepository
 * @package App\Repositories
 * @version May 9, 2022, 12:07 pm -05
*/

class AsignaturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'niv_id',
        'asg_nombre',
        'sex_id',
        'tri_id',
        'pro_id',
        'asg_estado'
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
        return Asignatura::class;
    }
}
