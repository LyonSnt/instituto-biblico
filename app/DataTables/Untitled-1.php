<?php

namespace App\DataTables;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('Y-m-d');
            })


            ->addColumn('roles',  function ($query) {
                return $query->roles->map(function ($role) {
                    return $role->name;
                })->implode('<br>');
            })
            ->editColumn('profile', function ($model) {
                return $model->profile->lang == "en" ? __("lang.English") : ($model->profile->lang == "ar" ? __("lang.Arabic") : ($model->profile->lang  == Null ? __("lang.Without") :
                            ''));
            })
            ->filterColumn('profile.lang', function ($query, $keyword) {
                if (stristr(__("lang.English"), $keyword))
                    $query->whereHas('profile', function (Builder $query) {
                        $query->where('lang', 'en');
                    });
                elseif (stristr(__("lang.Arabic"), $keyword))
                    $query->whereHas('profile', function (Builder $query) {
                        $query->where('lang', 'ar');
                    });
                elseif (stristr(__("lang.Without"), $keyword))
                    $query->whereHas('profile', function (Builder $query) {
                        $query->where('lang', Null);
                    });
            })
            ->filterColumn('roles', function ($query, $keyword) {
                if (stristr('Editor', $keyword))
                    $query->whereHas('roles', function (Builder $query) {
                        $query->where('name', 'Editor');
                    });
                elseif (stristr('User', $keyword))
                    $query->whereHas('roles', function (Builder $query) {
                        $query->where('name', 'User');
                    });
                elseif (stristr('Admin', $keyword))
                    $query->whereHas('roles', function (Builder $query) {
                        $query->where('name', 'Admin');
                    });
            })

            ->addColumn(
                'show',
                '<a href="{{ url("profile/".$id)}}" class="btn btn-primary btn-sm d-flex flex-nowrap"><i class="fas fa-eye mr-1 my-auto"></i> {{ __("lang.Show") }}</a>'
            )
            ->addColumn(
                'edit',
                '<a href="{{ route(adminview("users.edit"),$id)}}" class="btn btn-info btn-sm d-flex flex-nowrap"><i class="fas fa-edit mr-1 my-auto"></i> {{ __("lang.Edit") }}</a>'
            )
            ->addColumn(
                'delete',
                'admin.users_delBtn'
            )
            ->addColumn('checkbox', '<input type="checkbox" name="checked[]" class="item_checkbox" value="{{ $id }}" />')
            ->rawColumns([
                'checkbox', 'show', 'edit', 'delete', 'roles'
            ]);
    }


    public function query(User $model)
    {
        return $model->newQuery()->with('roles', 'profile')
            ->selectRaw('users.*')
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->minifiedAjax()
            ->orderBy(1)
            ->columns($this->getColumns())
            ->parameters([
                'dom' => 'Blfrtip',


                'buttons' => [
                    ['create', 'print', 'excel', 'reload'],
                    ['className' => 'delBtn', 'text' => '<i class="fa fa-trash"></i> ' . trans("lang.Delete")]
                ],

                'lengthMenu' => [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, trans('lang.All')]],


                'initComplete' => "function () {
                    this.api().columns([1,2,3,6]).every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).attr( 'style', 'text-align: center;width: 100%');
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });


                    this.api().columns([4,5]).every( function () {
                        var column = this;
                        var select = $('<select><option value=\"\"></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val )
                                    .draw();


                            } );
                            column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value=\"'+d+'\">'+d+'</option>' )
                        } );
                    } );



                }",

            ]);
    }


    protected function getColumns()
    {
        return [
            Column::make('checkbox')
                ->title('<input type="checkbox" class="check_all" onclick="check_all()" />')
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false),


            Column::make('id')->title(__('lang.Userid')),
            Column::make('name')->title(__('lang.Name')),
            Column::make('email')->title(__('lang.Email')),
            Column::make('roles')->title(__('lang.Role')),
            Column::make('profile', 'profile.lang')->title(__('lang.Favorite language')),
            Column::make('created_at')->title(__('lang.Created_at')),



            Column::computed('show')
                ->title(__('lang.Show'))
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false),
            Column::computed('edit')
                ->title(__('lang.Edit'))
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false),
            Column::computed('delete')
                ->title(__('lang.Delete'))
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false),
        ];
    }


    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
