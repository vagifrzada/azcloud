<?php

namespace App\DataTables;

use App\Entities\DataCenter\DataCenter;
use App\Entities\Product\Category\Category;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductCategoriesDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.products.categories.actions');
    }

    public function query(Category $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Category::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('description', "%{$searhTerm}%");
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('product-category-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'slug',
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
            ['data' => 'description', 'name' => 'description', 'title' => 'Description', 'searchable' => false, 'orderable' => false],
        ];
    }
}