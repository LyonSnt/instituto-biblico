<?php

namespace App\DataTables;

use App\Models\Asignatura;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AsignaturaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'asignaturas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Asignatura $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Asignatura $model)
    {

        return $model->newQuery()->with(['nivel', 'sexo', 'trimestre', 'profesordato']);
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
            'id' => new Column(['title' => __('models/asignaturas.fields.id'), 'data' => 'id','searchable' => false]),
            'niv_id' => new Column(['title' => __('models/asignaturas.fields.niv_id'), 'data' => 'nivel.niv_descripcion','searchable' => false]),
            'asg_nombre' => new Column(['title' => __('models/asignaturas.fields.asg_nombre'), 'data' => 'asg_nombre','searchable' => false]),
            'sex_id' => new Column(['title' => __('models/asignaturas.fields.sex_id'), 'data' => 'sexo.sex_descripcion','searchable' => false]),
            'tri_id' => new Column(['title' => __('models/asignaturas.fields.tri_id'), 'data' => 'trimestre.tri_descripcion','searchable' => false]),
            'pro_id' => new Column(['title' => __('models/asignaturas.fields.pro_id'), 'data' => 'profesordato.pro_nombre','searchable' => false]),
            'asg_estado' => new Column(['title' => __('models/asignaturas.fields.asg_estado'), 'data' => 'asg_estado','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'asignaturas_datatable_' . time();
    }
}
