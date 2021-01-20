<?php

namespace App\DataTables;

use App\Entities\Newsletter;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class NewsletterDataTables extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('subscribed_at', function (Newsletter $newsletter) {
                return $newsletter->getSubscribedAt();
            })
            ->addColumn('action', 'admin.newsletter.actions');
    }

    public function query(Newsletter $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('newsletter-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->addAction(['width' => '100px'])
            ->orderBy(0)
            ->parameters([
                'buttons'   => ['excel', 'csv', 'print', 'reset', 'reload'],
            ]);
    }

    protected function getColumns(): array
    {
        return [
            'id',
            'email',
            'ip',
            'subscribed_at',
        ];
    }

    protected function filename(): string
    {
        return 'Newsletter' . date('Y-m-d_H:i:s');
    }
}