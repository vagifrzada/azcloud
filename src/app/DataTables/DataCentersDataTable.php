<?php

namespace App\DataTables;

use App\Entities\DataCenter\DataCenter;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class DataCentersDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.data-centers.actions');
    }

    public function query(DataCenter $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return DataCenter::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE');
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('centers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description', 'searchable' => false, 'orderable' => false],
        ];
    }
}