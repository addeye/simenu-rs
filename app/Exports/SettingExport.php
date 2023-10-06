<?php

namespace App\Exports;

use App\Models\Setting;
use Maatwebsite\Excel\Concerns\FromCollection;

class SettingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Setting::all();
    }
}
