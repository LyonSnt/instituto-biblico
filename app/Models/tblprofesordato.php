<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tblprofesordato
 * @package App\Models
 * @version April 22, 2022, 9:33 pm -05
 *
 * @property \App\Models\tblsexo $tblsexo
 * @property \App\Models\tblestadocivil $tblestadocivil
 * @property \App\Models\tbliglesia $tbliglesia
 * @property string $pro_cedula
 * @property string $pro_apellido
 * @property string $pro_nombre
 * @property integer $sex_id
 * @property integer $esc_id
 * @property string $pro_fechanacimiento
 * @property string $pro_fechabautismo
 * @property string $pro_celular
 * @property string $pro_direccion
 * @property integer $igl_id
 * @property string $pro_imagen
 */
class tblprofesordato extends Model
{
    use SoftDeletes;


    public $table = 'tblprofesordatos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'pro_cedula',
        'pro_apellido',
        'pro_nombre',
        'sex_id',
        'esc_id',
        'pro_fechanacimiento',
        'pro_fechabautismo',
        'pro_celular',
        'pro_direccion',
        'igl_id',
        'pro_imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pro_cedula' => 'string',
        'pro_apellido' => 'string',
        'pro_nombre' => 'string',
        'sex_id' => 'integer',
        'esc_id' => 'integer',
        'pro_fechanacimiento' => 'string',
        'pro_fechabautismo' => 'string',
        'pro_celular' => 'string',
        'pro_direccion' => 'string',
        'igl_id' => 'integer',
        'pro_imagen' => 'string'
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
