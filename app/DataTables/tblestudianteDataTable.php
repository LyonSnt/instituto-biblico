<?php

namespace App\DataTables;

use App\Models\tblestudiante;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class tblestudianteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'tblestudiantes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\tblestudiante $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(tblestudiante $model)
    {
        return $model->newQuery()->with(['sexo', 'estadocivil', 'iglesia']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                        'extend' => 'create',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-plus"></i> ' . __('auth.app.create') . ''
                    ],
                    [
                        'extend' => 'export',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> ' . __('auth.app.export') . ''
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-print"></i> ' . __('auth.app.print') . ''
                    ],
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> ' . __('auth.app.reset') . ''
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-refresh"></i> ' . __('auth.app.reload') . ''
                    ],
                ],
                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => __('models/tblestudiantes.fields.id'), 'data' => 'id', 'searchable' => false]),
            'est_cedula' => new Column(['title' => __('models/tblestudiantes.fields.est_cedula'), 'data' => 'est_cedula', 'searchable' => false]),
            'est_apellido' => new Column(['title' => __('models/tblestudiantes.fields.est_apellido'), 'data' => 'est_apellido', 'searchable' => false]),
            'est_nombre' => new Column(['title' => __('models/tblestudiantes.fields.est_nombre'), 'data' => 'est_nombre', 'searchable' => false]),
            'sex_id' => new Column(['title' => __('models/tblestudiantes.fields.sex_id'), 'data' => 'sexo.sex_descripcion', 'searchable' => false]),
            'esc_id' => new Column(['title' => __('models/tblestudiantes.fields.esc_id'), 'data' => 'estadocivil.esc_decripcion', 'searchable' => false]),
            'est_fechanacimiento' => new Column(['title' => __('models/tblestudiantes.fields.est_fechanacimiento'), 'data' => 'est_fechanacimiento', 'searchable' => false]),
            'est_fechabautismo' => new Column(['title' => __('models/tblestudiantes.fields.est_fechabautismo'), 'data' => 'est_fechabautismo', 'searchable' => false]),
            'est_celular' => new Column(['title' => __('models/tblestudiantes.fields.est_celular'), 'data' => 'est_celular', 'searchable' => false]),
            'est_direccion' => new Column(['title' => __('models/tblestudiantes.fields.est_direccion'), 'data' => 'est_direccion', 'searchable' => false]),
            'igl_id' => new Column(['title' => __('models/tblestudiantes.fields.igl_id'), 'data' => 'iglesia.igl_nombre', 'searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tblestudiantes_datatable_' . time();
    }
}
