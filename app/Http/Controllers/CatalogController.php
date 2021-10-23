<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.listcatalog', [
            'catalog' => Catalog::latest()->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcatalog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:10240',
            'rating' => 'required',
        ]);

        $file = $request->file('image');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/catalogs/';
        $file->move($tujuan_upload, $nama_file);

        Catalog::create([
            'title' => $request->title,
            'image' => $nama_file,
            'like' => $request->rating,
            'tags_1' => $request->tags_1,
            'tags_2' => $request->tags_2,
            'tags_3' => $request->tags_3
        ]);
        return redirect()->route('listcatalog.index')
            ->with('success', 'Catalog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = Catalog::where('id', $id)->first();
        File::delete('images/catalogs' . $gambar->image);
        Catalog::where('id', $id)->delete();
        return redirect()->route('listcatalog.index')
            ->with('success', 'Catalog deleted successfully');
    }
}
