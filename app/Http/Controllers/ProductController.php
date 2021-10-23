<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.listproduct', [
            'products' => Product::latest()->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addproduct');
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
            'description' => 'required',
            'price' => 'required',
        ]);

        $file = $request->file('image');
        $str = strtolower($request->title);
        $slug = preg_replace('/\s+/', '%20', $str);
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images/products';
        $file->move($tujuan_upload, $nama_file);

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $nama_file,
            'slug' => $slug,
            'sale' => $request->price,
            'rating' => $request->rating
        ]);
        return redirect()->route('listproduct.index')
            ->with('success', 'Product created successfully.');
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
        return view('admin.editproduct', [
            'product' => Product::where('id_product', $id)->first()
        ]);
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
        $id = $id;
        // $request->validate([
        //     'title' => 'required',
        //     'image' => 'required|file|image|mimes:jpeg,png,jpg|max:10240',
        //     'rating' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        // ]);
        if ($request->file('image') == "") {

            $product = Product::where('id_product', $id);
            $str = strtolower($request->title);
            $slug = preg_replace('/\s+/', '%20', $str);
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $slug,
                'sale' => $request->price,
                'rating' => $request->rating
            ]);
            return redirect()->route('listproduct.index')
                ->with('success', 'Product updated successfully');
        } else {

            //hapus old image
            $gambar = Product::where('id_product', $id)->first();
            $update = Product::where('id_product', $id);
            File::delete('images/products' . $gambar->image);
            //upload new image
            $tujuan_upload = 'images/products';
            $file = $request->file('image');
            $str = strtolower($request->title);
            $slug = preg_replace('/\s+/', '%20', $str);
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move($tujuan_upload, $nama_file);

            $update->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $nama_file,
                'slug' => $slug,
                'sale' => $request->price,
                'rating' => $request->rating
            ]);
            return redirect()->route('listproduct.index')
                ->with('success', 'Product updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = Product::where('id_product', $id)->first();
        File::delete('images/catalogs' . $gambar->image);
        Product::where('id_product', $id)->delete();
        return redirect()->route('listproduct.index')
            ->with('success', 'Product deleted successfully');
    }
}
