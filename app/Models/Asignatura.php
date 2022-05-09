<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Asignatura
 * @package App\Models
 * @version May 9, 2022, 12:07 pm -05
 *
 * @property \App\Models\tblnivel $tblnivel
 * @property \App\Models\tblsexo $tblsexo
 * @property \App\Models\tbltrimestre $tbltrimestre
 * @property \App\Models\tblprofesordato $tblprofesordato
 * @property integer $niv_id
 * @property string $asg_nombre
 * @property integer $sex_id
 * @property integer $tri_id
 * @property integer $pro_id
 * @property string $asg_estado
 */
class Asignatura extends Model
{
    use SoftDeletes;


    public $table = 'asignaturas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'niv_id',
        'asg_nombre',
        'sex_id',
        'tri_id',
        'pro_id',
        'asg_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'niv_id' => 'integer',
        'asg_nombre' => 'string',
        'sex_id' => 'integer',
        'tri_id' => 'integer',
        'pro_id' => 'integer',
        'asg_estado' => 'string'
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
    public function nivel()
    {
        return $this->belongsTo(\App\Models\tblnivel::class, 'niv_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function sexo()
    {
        return $this->belongsTo(\App\Models\tblsexo::class, 'sex_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function trimestre()
    {
        return $this->belongsTo(\App\Models\tbltrimestre::class, 'tri_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function profesordato()
    {
        return $this->belongsTo(\App\Models\tblprofesordato::class, 'pro_id', 'id');
    }
}
