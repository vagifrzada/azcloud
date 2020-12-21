<?php

namespace App\DataTables;

use App\Entities\Post\Post;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PostsDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (Post $post) {
                return $post->getCreatedAt();
            })
            ->addColumn('action', 'admin.posts.actions');
    }

    public function query(Post $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('posts-table')
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
            'title',
            'created_at',
        ];
    }

    protected function filename(): string
    {
        return 'Posts_' . date('YmdHis');
    }
}