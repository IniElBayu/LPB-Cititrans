<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function downloadPdf($id)
    {
        $report = Report::findOrFail($id);

        $pdf = Pdf::loadView('laporan.print', compact('report'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-' . $id . '.pdf');
    }
}