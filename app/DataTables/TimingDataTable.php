<?php

namespace App\DataTables;

use App\Models\Timing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TimingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $string = '
            <div class="d-md-flex justify-content-md-end btnactions">
            <a href="/admin/timing/' . $query->id . '/edit" ><i class="bx bx-edit mx-2"></i></a>
            <form action="/admin/timing/' . $query->id . '" method="post">
            ' . csrf_field() . '
            ' . method_field("DELETE") . '
            <button type="submit" onclick="return confirm(`Are you sure ?`)" class="border-0 text-danger bg-transparent"><i class="bx bx-x-circle"></i></button>
            </form></div>';

                return $string;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Timing $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Timing $model): QueryBuilder
    {
        return $model->newQuery()->with(['category'])->select('timings.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('timing-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name')->title('Timing'),
            Column::make('slug'),
            Column::make('category.name')->title('Category'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Timing_' . date('YmdHis');
    }
}
