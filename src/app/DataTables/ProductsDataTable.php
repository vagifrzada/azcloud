<?php

namespace App\DataTables;

use App\Entities\Product\Product;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductsDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('category', function (Product $product) {
                return $product->getCategory()->getTitle();
            })
            ->editColumn('status', function (Product $product) {
                return $product->isActive() ? 'Active' : 'Disabled';
            })
            ->addColumn('action', 'admin.products.actions');
    }

    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();

        /*if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Page::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('description', "%{$searhTerm}%")
            ->orWhereTranslationLike('content', "%{$searhTerm}%")
            ->orWhere('identity', $searhTerm);*/
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('products-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            ['data' => 'category', 'name' => 'category', 'title' => 'Category', 'searchable' => false, 'orderable' => false],
            'title',
            'slug',
            'status',
        ];
    }
}