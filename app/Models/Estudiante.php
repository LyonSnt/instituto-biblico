<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Estudiante
 * @package App\Models
 * @version April 26, 2022, 3:39 pm -05
 *
 * @property \App\Models\tblsexo $tblsexo
 * @property \App\Models\tblestadocivil $tblestadocivil
 * @property \App\Models\tbliglesia $tbliglesia
 * @property string $est_cedula
 * @property string $est_apellido
 * @property string $est_nombre
 * @property integer $sex_id
 * @property integer $esc_id
 * @property string $est_fechanacimiento
 * @property string $est_fechabautismo
 * @property string $est_celular
 * @property string $est_direccion
 * @property integer $igl_id
 * @property string $est_imagen
 */
class Estudiante extends Model
{
    use SoftDeletes;


    public $table = 'tblestudiantes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'est_cedula',
        'est_apellido',
        'est_nombre',
        'sex_id',
        'esc_id',
        'est_fechanacimiento',
        'est_fechabautismo',
        'est_celular',
        'est_direccion',
        'igl_id',
        'est_imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'est_cedula' => 'string',
        'est_apellido' => 'string',
        'est_nombre' => 'string',
        'sex_id' => 'integer',
        'esc_id' => 'integer',
        'est_fechanacimiento' => 'string',
        'est_fechabautismo' => 'string',
        'est_celular' => 'string',
        'est_direccion' => 'string',
        'igl_id' => 'integer',
        'est_imagen' => 'string'
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
    public function sexo()
    {
        return $this->belongsTo(\App\Models\tblsexo::class, 'sex_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function estadocivil()
    {
        return $this->belongsTo(\App\Models\tblestadocivil::class, 'esc_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function iglesia()
    {
        return $this->belongsTo(\App\Models\tbliglesia::class, 'igl_id', 'id');
    }
}
