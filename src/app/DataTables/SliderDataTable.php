<?php

namespace App\DataTables;

use App\Entities\Page\Page;
use App\Entities\Slider\Slider;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SliderDataTable extends DataTable
{
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.slider.actions');
    }

    public function query(Slider $model): QueryBuilder
    {
        if (($searhTerm = $this->request->input('search.value')) === null)
            return $model->newQuery();
        $searhTerm = e(trim($searhTerm));

        return Slider::whereTranslation('title', "%{$searhTerm}%", null, 'orWhereHas', 'LIKE')
            ->orWhereTranslationLike('description', "%{$searhTerm}%");
    }

    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('slider-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px'])
            ->orderBy(0, 'ASC');
    }

    protected function getColumns(): array
    {
        return [
            'id',
            ['data' => 'title', 'name' => 'title', 'title' => 'Title', 'searchable' => false, 'orderable' => false],
            'order',
            'status',
            'buy_link',
            'prices_link',
        ];
    }
}