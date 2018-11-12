<?php

namespace App\services;

use App\Exports\ReviewsExport;
use App\Reviews;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Exception;

class CSVService
{
    public function getCsvReviews(Reviews $data)
    {
        if(empty($data)) {
            throw new Exception('We have not reviews');
        }
        try {
            $html = new ReviewsExport();
            Excel::download($html, 'text.xlsx');
        } catch (\Throwable $x) {
            echo $x->getMessage();
        }
    }
}