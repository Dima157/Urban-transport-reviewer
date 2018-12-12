<?php

namespace App\Http\Controllers;

use App\services\PythonScriptExec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReviewsExport;

class ReportingController extends Controller
{
    public function index()
    {
        return view('reporting');
    }

    public function getAllData(Request $r)
    {
        $this->storeData();
        $type = $r->type;
        $file = $this->buildGraphic($type, $r);
        return $file;
    }

    private function buildGraphic($type, $request)
    {
        switch ($type) {
            case 'date': return $this->buildGraphicByDate($request);break;
            case 'all': return $this->buildGraphicWithAllData();break;
        }
    }

    private function buildGraphicByDate(Request $r)
    {
        $data['dateStart'] = $r->dateStart ?? '2018-11-01';
        $data['dateEnd'] = $r->dateEnd ?? '2018-12-12';
        $data['type'] = 'date';
        PythonScriptExec::exec(PythonScriptExec::GRAPHIC, $data);
        $url = URL::to('/') . '/graphics/date.pdf';
        return $url;
    }

    private function buildGraphicWithAllData()
    {
        PythonScriptExec::exec(PythonScriptExec::GRAPHIC);
        $url = URL::to('/') . '/graphics/all.pdf';
        return $url;
    }

    private function storeData()
    {
        Excel::store(new ReviewsExport(), 'review.csv');
    }
}
