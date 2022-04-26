<?php

namespace App\DataTables;

use App\Models\tbldirectiva;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class tbldirectivaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'tbldirectivas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\tbldirectiva $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(tbldirectiva $model)
    {
        return $model->newQuery()->with(['cargo', 'profesordato', 'sexo']);
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
            'id' => new Column(['title' => __('models/tbldirectivas.fields.id'), 'data' => 'id','searchable' => false]),
            'pro_id' => new Column(['title' => __('models/tbldirectivas.fields.pro_id'), 'data' => 'profesordato.pro_nombre','searchable' => false]),
            'car_id' => new Column(['title' => __('models/tbldirectivas.fields.car_id'), 'data' => 'cargo.car_descripcion','searchable' => false]),

            'sex_id' => new Column(['title' => __('models/tbldirectivas.fields.sex_id'), 'data' => 'sexo.sex_descripcion','searchable' => false]),
            'dir_estado' => new Column(['title' => __('models/tbldirectivas.fields.dir_estado'), 'data' => 'dir_estado','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tbldirectivas_datatable_' . time();
    }
}
