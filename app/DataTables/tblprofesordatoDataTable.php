<?php

namespace App\DataTables;

use App\Models\tblprofesordato;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class tblprofesordatoDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'tblprofesordatos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\tblprofesordato $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(tblprofesordato $model)
    {
        return $model->newQuery();
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
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
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
            'id' => new Column(['title' => __('models/tblprofesordatos.fields.id'), 'data' => 'id','searchable' => false]),
            'pro_cedula' => new Column(['title' => __('models/tblprofesordatos.fields.pro_cedula'), 'data' => 'pro_cedula','searchable' => false]),
            'pro_apellido' => new Column(['title' => __('models/tblprofesordatos.fields.pro_apellido'), 'data' => 'pro_apellido','searchable' => false]),
            'pro_nombre' => new Column(['title' => __('models/tblprofesordatos.fields.pro_nombre'), 'data' => 'pro_nombre','searchable' => false]),
            'sex_id' => new Column(['title' => __('models/tblprofesordatos.fields.sex_id'), 'data' => 'sex_id','searchable' => false]),
            'esc_id' => new Column(['title' => __('models/tblprofesordatos.fields.esc_id'), 'data' => 'esc_id','searchable' => false]),
            'pro_fechanacimiento' => new Column(['title' => __('models/tblprofesordatos.fields.pro_fechanacimiento'), 'data' => 'pro_fechanacimiento','searchable' => false]),
            'pro_fechabautismo' => new Column(['title' => __('models/tblprofesordatos.fields.pro_fechabautismo'), 'data' => 'pro_fechabautismo','searchable' => false]),
            'pro_celular' => new Column(['title' => __('models/tblprofesordatos.fields.pro_celular'), 'data' => 'pro_celular','searchable' => false]),
            'pro_direccion' => new Column(['title' => __('models/tblprofesordatos.fields.pro_direccion'), 'data' => 'pro_direccion','searchable' => false]),
            'igl_id' => new Column(['title' => __('models/tblprofesordatos.fields.igl_id'), 'data' => 'igl_id','searchable' => false]),
            'pro_imagen' => new Column(['title' => __('models/tblprofesordatos.fields.pro_imagen'), 'data' => 'pro_imagen','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tblprofesordatos_datatable_' . time();
    }
}
