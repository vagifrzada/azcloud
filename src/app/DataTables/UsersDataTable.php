<?php

namespace App\DataTables;

use App\Entities\User;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UsersDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (User $user) {
                return $user->getCreatedAt();
            })
            ->addColumn('action', 'admin.users.actions');
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'name',
            'email',
            'created_at',
        ];
    }

    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
