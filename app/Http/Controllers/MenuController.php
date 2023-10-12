<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::query();

        $sort = request('sort_val') ?? 'DESC';
        if (request('sort_name') == 'nama') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $menu->orderBy('nama', request('sort_val'));
        }

        if (request('sort_name') == 'gambar') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $menu->orderBy('gambar', request('sort_val'));
        }

        if (request('sort_name') == 'link') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $menu->orderBy('link', request('sort_val'));
        }

        if (request('sort_name') == 'status') {
            $sort = $sort == 'DESC' ? 'ASC' : 'DESC';
            $menu->orderBy('status', request('sort_val'));
        }

        if($sort == 'DESC'){
            $menu->orderBy('urutan', 'ASC');
        }

        if (request('cari')) {
            $menu->where(function ($q) {
                $q->where('nama', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('gambar', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('link', 'LIKE', '%' . request('cari') . '%')
                    ->orWhere('status', 'LIKE', '%' . request('cari') . '%');
            });
        }

        $menu = $menu->orderBy('created_at', $sort)->paginate()->withQueryString();

        return view('pages.menu.list', [
            'data' => $menu->withPath('menu'),
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
        return view('pages.menu.add', []);
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
            'gambar' => 'required',
            'link' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama Menu Wajib terisi!',
            'gambar.required' => 'Gambar Wajib terisi!',
            'link.required' => 'Link Wajib terisi!',
        ];


        $request->validate($rules, $messages);
        $datarow = $request->all();

        if ($request->file('gambar')) {
            $path = $request->file('gambar')->store('upload', 'public');
            $datarow['gambar'] = $path;
        }



        Menu::create($datarow);

        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('pages.menu.detail', [
            'data' => $menu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('pages.menu.edit', [
            'data' => $menu,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'nama' => 'required',
            'link' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama Menu Wajib terisi!',
            'link.required' => 'Link Wajib terisi!',
        ];


        $request->validate($rules, $messages);
        $datarow = $request->all();

        unset($datarow['gambar']);
        if ($request->file('gambar')) {
            Storage::disk('public')->delete($menu->gambar);
            $path = $request->file('gambar')->store('upload', 'public');
            $datarow['gambar'] = $path;
        }

        $menu->update($datarow);

        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }


        $menu->delete();
        return redirect('menu');
    }

    public function export()
    {
        return Excel::download(new MenuExport, 'menus.xlsx');
    }

    public function setStatus($id){
        $menu = Menu::find($id);
        $menu->status = !$menu->status;
        $menu->save();

        return redirect('menu');
    }

    public function urutan(){
        return view('pages.menu.sorting',[
            'menus' => Menu::where('status', 1)->orderBy('urutan')->get()
        ]);
    }

    public function setUrutan(Request $request){
        // return $request->all();
        foreach($request->sort as $key => $sort){
            Menu::where('id',$sort)->update(['urutan'=>$key+1]);
        }
        return redirect('menu-urutan');
    }
}
