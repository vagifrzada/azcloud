<?php

namespace App\DataTables;

use App\Entities\Post\Post;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
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
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Post::whereTranslation('slug', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('title', "%{$searhTerm}%")
            ->orWhere('id', $searhTerm);
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
            ['data' => 'slug', 'name' => 'slug', 'title' => 'Slug', 'searchable' => false, 'orderable' => false],
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
            'created_at',
        ];
    }
}