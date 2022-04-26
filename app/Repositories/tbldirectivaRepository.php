<?php

namespace App\Repositories;

use App\Models\tbldirectiva;
use App\Repositories\BaseRepository;

/**
 * Class tbldirectivaRepository
 * @package App\Repositories
 * @version April 22, 2022, 8:25 pm -05
*/

class tbldirectivaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'car_id',
        'pro_id',
        'sex_id',
        'dir_estado'
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
        return tbldirectiva::class;
    }
}
