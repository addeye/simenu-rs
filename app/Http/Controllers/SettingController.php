<?php

namespace App\Http\Controllers;

use App\Exports\SettingExport;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::query();

        $sort = request('sort_val') ?? 'DESC';
        if (request('sort_name') == 'nama') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $setting->orderBy('nama', request('sort_val'));
        }

        if (request('sort_name') == 'intro') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $setting->orderBy('intro', request('sort_val'));
        }

        if (request('sort_name') == 'footer') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $setting->orderBy('footer', request('sort_val'));
        }

        if (request('sort_name') == 'Logo') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $setting->orderBy('Logo', request('sort_val'));
        }


        if (request('cari')) {
            $setting->where(function ($q) {
                $q->where('nama', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('intro', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('footer', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('Logo', 'LIKE', '%' . request('cari') . '%');
            });
        }

        $setting = $setting->orderBy('created_at', $sort)->paginate()->withQueryString();

        return view('pages.setting.list', [
            'data' => $setting->withPath('setting'),
            'sort' => $sort
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.setting.add', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'intro' => 'required',
            'footer' => 'required',
            'logo' => 'required'
        ];

        $messages = [
            'nama.required' => 'Nama Wajib terisi!',
            'intro.required' => 'Intro Wajib terisi!',
            'footer.required' => 'Footer Wajib terisi!',
            'logo.required' => 'Logo Wajib terisi!'
        ];


        $request->validate($rules, $messages);
        $datarow = $request->all();

        if ($request->file('logo')) {
            $path = $request->file('logo')->store('upload', 'public');
            $datarow['logo'] = $path;
        }

        Setting::create($datarow);

        return redirect('setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('pages.setting.detail', [
            'data' => $setting
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('pages.setting.edit', [
            'data' => $setting,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $rules = [
            'nama' => 'required',
            'intro' => 'required',
            'footer' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama Wajib terisi!',
            'intro.required' => 'Intro Wajib terisi!',
            'footer.required' => 'Footer Wajib terisi!'
        ];


        $request->validate($rules, $messages);
        $datarow = $request->all();

        unset($datarow['logo']);
        if ($request->file('logo')) {
            Storage::disk('public')->delete($setting->logo);
            $path = $request->file('logo')->store('upload', 'public');
            $datarow['logo'] = $path;
        }

        // dd($datarow);
        unset($datarow['_token']);
        unset($datarow['_method']);



        $setting->update($datarow);

        return redirect('setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        if ($setting->logo) {
            Storage::disk('public')->delete($setting->logo);
        }


        $setting->delete();
        return redirect('setting');
    }

    public function export()
    {
        return Excel::download(new SettingExport, 'settings.xlsx');
    }
}
