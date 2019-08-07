<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\permintaanbrg;
use Illuminate\Http\Request;

class permintaanbrgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $permintaanbrg = permintaanbrg::where('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('nama_brg', 'LIKE', "%$keyword%")
                ->orWhere('permintaan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $permintaanbrg = permintaanbrg::latest()->paginate($perPage);
        }

        return view('permintaanbrg.index', compact('permintaanbrg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('permintaanbrg.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        permintaanbrg::create($requestData);

        return redirect('permintaanbrg')->with('flash_message', 'permintaanbrg added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $permintaanbrg = permintaanbrg::findOrFail($id);

        return view('permintaanbrg.show', compact('permintaanbrg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $permintaanbrg = permintaanbrg::findOrFail($id);

        return view('permintaanbrg.edit', compact('permintaanbrg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $permintaanbrg = permintaanbrg::findOrFail($id);
        $permintaanbrg->update($requestData);

        return redirect('permintaanbrg')->with('flash_message', 'permintaanbrg updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        permintaanbrg::destroy($id);

        return redirect('permintaanbrg')->with('flash_message', 'permintaanbrg deleted!');
    }
}
