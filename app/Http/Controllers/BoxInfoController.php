<?php

namespace App\Http\Controllers;

use App\Models\BoxInfo;

class BoxInfoController extends Controller
{
    public function box_info()
    {
        return view('backend_assignment_task.index');
    }
    public function box_count()
    {
        $box_col = BoxInfo::get()->groupBy(function($q){
            return $q->col_number;
        });
        return $box_col;
    }
}
