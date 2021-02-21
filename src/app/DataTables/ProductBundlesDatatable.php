<?php

namespace App\DataTables;

use Illuminate\Support\Str;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use App\Entities\Product\Bundle\Bundle;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductBundlesDatatable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('price', function (Bundle $bundle) {
                return $bundle->price === 0 ? 'Not defined' : (($bundle->price / 100) . ' AZN');
            })
            ->editColumn('description', function (Bundle $bundle) {
                return Str::limit($bundle->description);
            })
            ->addColumn('action', 'admin.products.bundles.actions');
    }

    public function query(Bundle $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Bundle::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('description', "%{$searhTerm}%");
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('product-bundles-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'price',
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description', 'searchable' => false, 'orderable' => false],
        ];
    }
}