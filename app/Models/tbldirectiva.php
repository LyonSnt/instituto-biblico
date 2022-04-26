<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tbldirectiva
 * @package App\Models
 * @version April 22, 2022, 8:25 pm -05
 *
 * @property \App\Models\tblcargo $tblcargo
 * @property \App\Models\tblprofesordato $tblprofesordato
 * @property \App\Models\tblsexo $tblsexo
 * @property integer $car_id
 * @property integer $pro_id
 * @property integer $sex_id
 * @property integer $dir_estado
 */
class tbldirectiva extends Model
{
    use SoftDeletes;


    public $table = 'tbldirectivas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'car_id',
        'pro_id',
        'sex_id',
        'dir_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'car_id' => 'integer',
        'pro_id' => 'integer',
        'sex_id' => 'integer',
        'dir_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function cargo()
    {
        return $this->belongsTo(\App\Models\tblcargo::class, 'car_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function profesordato()
    {
        return $this->belongsTo(\App\Models\tblprofesordato::class, 'pro_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function sexo()
    {
        return $this->belongsTo(\App\Models\tblsexo::class, 'sex_id', 'id');
    }
}
