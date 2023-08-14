<?php

namespace App\DataTables;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UrlDataTable extends DataTable
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
        ->addColumn('title', function ($query){
            return '<a href="/admin/url/'.$query->id.'/edit" >'.$query->title.'</a>';
        })
        ->addColumn('slug', function ($query){
            
            return ' <a href="'.$query->slug.'" target="_blank" >'.$query->slug.'</a>';
        })
            ->addColumn('created_at', function ($query){
            return date("d-m-Y",strtotime($query->created_at));
        })
        ->addColumn('updated_at', function ($query){
            return date("d-m-Y H:i",strtotime($query->updated_at)+19800);
        })
        ->addColumn('action', function ($query){
            $url = '/'.$query->category_slug;
            $url .= (!is_null($query->subcat_slug))? '/'.$query->subcat_slug : '';
            $url .= (!is_null($query->country_slug))? '/'.$query->country_slug : '';
            $url .= (!is_null($query->city_slug))? '/'.$query->city_slug : '';
            $url .= (!is_null($query->timing_slug))? '/'.$query->timing_slug : '';
            $string = '<div class="d-md-flex justify-content-md-end btnactions">
            <a href="'.$url.'" target="_blank" ><i class="bx bxs-chevron-right-circle mx-2" ></i></a>
            <a href="/admin/url/'.$query->id.'/edit" ><i class="bx bxs-edit mx-2"></i></a>
            </div>';
            return $string;
        })->rawColumns(['title','slug','created_at','updated_at','action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Url $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Url $model): QueryBuilder
    {
        return $model->newQuery()->with('sections')->select('urls.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('url-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('title')->title('Title'),
            Column::make('slug')->title('URL'),
            Column::make('created_at')->title('Created at'),
            Column::make('updated_at')->title('Updated at'),
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
        return 'Url_' . date('YmdHis');
    }
}
