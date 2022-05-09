<?php

namespace App\Repositories;

use App\Models\Matricula;
use App\Repositories\BaseRepository;

/**
 * Class MatriculaRepository
 * @package App\Repositories
 * @version May 9, 2022, 1:16 pm -05
*/

class MatriculaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'est_id',
        'asg_id',
        'mes_id',
        'ani_id',
        'aul_id',
        'mtr_estado'
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
        return Matricula::class;
    }
}
