<?php

namespace App\DataTables;

use App\Models\ProviderListing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProviderListingDataTable extends DataTable
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
            ->addColumn('image', function ($query)
            {
                if (is_null($query->image)) {
                    return ' <img src="https://dummyimage.com/50x50/adadad/000000&text=no+image">';
                }else{

                    $url = asset('/uploads');
                    return ' <img src="'.$url.'/'.$query->image.'" class="w-50 img-fluid">';
                }
            })->addColumn('is_promoted', function ($query)
            {
                $m0 =($query->is_promoted == '0')?'selected':'';
                $m1 =($query->is_promoted == '1')?'selected':'';
                $m2 =($query->is_promoted == '2')?'selected':'';                
                
                return '<select name="is_promted" id="is_promted" class="form-control form-select" data-id="'.$query->id.'">
                <option value="0" '.$m0.'>Select</option>
                <option value="1" '.$m1.'>Basic</option>
                <option value="2" '.$m2.'>Featured</option>
               </select>';
            })
            ->addColumn('created_at', function ($query){
                return date("d-m-Y",strtotime($query->created_at));
            })
            ->addColumn('updated_at', function ($query){
                return date("d-m-Y H:i",strtotime($query->updated_at)+19800);
            })
            ->addColumn('action',function ($query)
            {
                return '<a type="button" class="btn btn-secondary" href="/admin/listing/'.$query->id.'/edit">Edit</a>';
            })
            ->rawColumns(['image','is_promoted','created_at','updated_at','action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProviderListing $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProviderListing $model): QueryBuilder
    {
        return $model->newQuery()->with('provider');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('providerlisting-table')
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
            Column::make('provider.name')->title('Provider'),
            Column::make('reference_id'),
            Column::make('title'),
            Column::make('image'),
            // Column::make('months'),
            // Column::make('is_promoted'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ProviderListing_' . date('YmdHis');
    }
}
