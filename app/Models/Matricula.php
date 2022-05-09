<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Matricula
 * @package App\Models
 * @version May 9, 2022, 1:16 pm -05
 *
 * @property \App\Models\Estudiante $estudiante
 * @property \App\Models\Asignatura $asignatura
 * @property \App\Models\Mes $mes
 * @property \App\Models\tblanioacademico $tblanioacademico
 * @property \App\Models\tblaula $tblaula
 * @property integer $est_id
 * @property integer $asg_id
 * @property integer $mes_id
 * @property integer $ani_id
 * @property integer $aul_id
 * @property integer $mtr_estado
 */
class Matricula extends Model
{
    use SoftDeletes;


    public $table = 'tblmatriculas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'est_id',
        'asg_id',
        'mes_id',
        'ani_id',
        'aul_id',
        'mtr_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'est_id' => 'integer',
        'asg_id' => 'integer',
        'mes_id' => 'integer',
        'ani_id' => 'integer',
        'aul_id' => 'integer',
        'mtr_estado' => 'integer'
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
    public function estudiante()
    {
        return $this->belongsTo(\App\Models\Estudiante::class, 'est_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function asignatura()
    {
        return $this->belongsTo(\App\Models\Asignatura::class, 'asg_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function mes()
    {
        return $this->belongsTo(\App\Models\Mes::class, 'mes_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function anioacademico()
    {
        return $this->belongsTo(\App\Models\tblanioacademico::class, 'ani_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function aula()
    {
        return $this->belongsTo(\App\Models\tblaula::class, 'aul_id', 'id');
    }
}
