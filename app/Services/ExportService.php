<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\GenericExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    /**
     * Excel Export
     */
    public function excel($data, $columns, $filename)
    {
        return Excel::download(
            new GenericExport($data, $columns),
            $filename . '.xlsx'
        );
    }

    /**
     * PDF Export
     */
    public function pdf($title, $data, $columns, $filename)
    {
        $pdf = Pdf::loadView(
            'export.pdf',
            compact(
                'title',
                'data',
                'columns'
            )
        );

        return $pdf->download($filename . '.pdf');
    }

    /**
     * Print
     */
    public function print($title, $data, $columns)
    {
        return view(
            'export.print',
            compact(
                'title',
                'data',
                'columns'
            )
        );
    }
}