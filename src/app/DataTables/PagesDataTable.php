<?php

namespace App\DataTables;

use App\Entities\Page\Page;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PagesDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.pages.actions');
    }

    public function query(Page $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Page::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('description', "%{$searhTerm}%")
            ->orWhere('identity', $searhTerm);
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('pages-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'identity',
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
        ];
    }
}