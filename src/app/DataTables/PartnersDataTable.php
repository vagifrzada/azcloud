<?php

namespace App\DataTables;

use App\Entities\Partner;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PartnersDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.partners.actions');
    }

    public function query(Partner $model): QueryBuilder
    {
       return $model->newQuery();
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('partners-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'title',
            'link',
        ];
    }
}