<?php

namespace App\DataTables;

use App\Entities\Product\Feature\Feature;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductFeaturesDatatable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('description', function (Feature $feature) {
                return Str::limit($feature->description);
            })
            ->addColumn('action', 'admin.products.features.actions');
    }

    public function query(Feature $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Feature::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('description', "%{$searhTerm}%");
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('product-features-table')
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