<?php

namespace App\DataTables;

use App\Models\Matricula;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class MatriculaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'matriculas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Matricula $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Matricula $model)
    {
        return $model->newQuery()->with(['estudiante', 'asignatura', 'mes', 'anioacademico', 'aula']);
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
            'id' => new Column(['title' => __('models/matriculas.fields.id'), 'data' => 'id','searchable' => false]),
            'est_id' => new Column(['title' => __('models/matriculas.fields.est_id'), 'data' => 'estudiante.est_nombre','searchable' => false]),
            'asg_id' => new Column(['title' => __('models/matriculas.fields.asg_id'), 'data' => 'asignatura.asg_nombre','searchable' => false]),
            'mes_id' => new Column(['title' => __('models/matriculas.fields.mes_id'), 'data' => 'mes.mes_nombre','searchable' => false]),
            'ani_id' => new Column(['title' => __('models/matriculas.fields.ani_id'), 'data' => 'anioacademico.ani_anio','searchable' => false]),
            'aul_id' => new Column(['title' => __('models/matriculas.fields.aul_id'), 'data' => 'aula.aul_nombre','searchable' => false]),
            'mtr_estado' => new Column(['title' => __('models/matriculas.fields.mtr_estado'), 'data' => 'mtr_estado','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'matriculas_datatable_' . time();
    }
}
