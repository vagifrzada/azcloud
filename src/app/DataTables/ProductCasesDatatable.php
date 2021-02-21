<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use App\Entities\Product\UseCase\UseCase;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductCasesDatatable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.products.cases.actions');
    }

    public function query(UseCase $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return UseCase::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE');
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('product-cases-table')
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
            'status',
        ];
    }
}