<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use App\Entities\Certificate\Certificate;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CertificatesDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.certificates.actions');
    }

    public function query(Certificate $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Certificate::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE');
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('certificates-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'status',
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
        ];
    }
}