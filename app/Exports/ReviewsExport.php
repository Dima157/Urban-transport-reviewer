<?php

namespace App\Exports;

use App\Reviews;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReviewsExport implements FromView
{

    public function view(): View
    {
        return view('csv.review', ['reviews' => Reviews::all()]);
    }
}
