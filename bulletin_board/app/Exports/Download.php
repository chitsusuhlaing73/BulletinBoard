<?php

namespace App\Exports;

use DB;
use App\Admin;
use Maatwebsite\Excel\Concerns\FromQuery;

class Download implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Admin::query();

    }
}
