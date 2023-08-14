<?php

namespace App\DataTables;

use App\Models\CountrySection;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CountrySectionDataTable extends DataTable
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
            ->addColumn('action', function ($query)            {
                $string = '<div class="d-md-flex justify-content-md-end btnactions">
                <a href="/admin/country/section/'.$query->category->id.'/edit/'.$query->country->id.'" ><i class="bx bx-edit mx-2"></i></a>
                <form action="/admin/countrysection/'.$query->id.'" method="post">
                '.csrf_field().'
                '.method_field("DELETE").'
                <button type="submit" onclick="return confirm(`Are you sure ?`)" class="border-0 text-danger bg-transparent"><i class="bx bx-x-circle"></i></button>
                </form></div>';
                return $string;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CountrySection $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CountrySection $model): QueryBuilder
    {
        return $model->newQuery()->with('category','country')->select('country_sections.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('countrysection-table')
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
            Column::make('category.name')->title('Category Name'),
            Column::make('country.name')->title('Country'),
            Column::make('country_title'),
            Column::make('country_order'),
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
        return 'CountrySection_' . date('YmdHis');
    }
}
