<?php

namespace App\DataTables;

use App\Entities\Service\Service;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ServicesDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (Service $service) {
                return $service->getCreatedAt();
            })
            ->addColumn('action', 'admin.services.actions');
    }

    public function query(Service $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Service::whereTranslation('slug', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('title', "%{$searhTerm}%")
            ->orWhereTranslationLike('subtitle', "%{$searhTerm}%")
            ->orWhere('id', $searhTerm);
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('services-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            ['data' => 'slug', 'name' => 'slug', 'title' => 'Slug', 'searchable' => false, 'orderable' => false],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
            ['data' => 'subtitle', 'name' => 'subtitle', 'title' => 'SubTitle', 'searchable' => false, 'orderable' => false],
            'created_at',
        ];
    }
}