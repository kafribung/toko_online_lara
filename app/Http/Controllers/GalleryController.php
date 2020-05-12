<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Class Validasi Request
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\ProductRequest;


// Import DB Gallery
use App\Models\Gallery;

// Import DB Product
use App\Models\Product;

class GalleryController extends Controller
{
    // READ
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->get();

        return view('dashboard.gallery', compact('galleries'));
    }

    // CREATE URL
    public function create()
    {
        $products = Product::all();

        return view('dashboardCreate.gallery_create', compact('products'));
    }

    // CREATE
    public function store(GalleryRequest $request)
    {

        $gallery = $request->all();

        if ($request->has('image')) {
            $img= $request->file('image');
            $name             = time().'.'.$img->getClientOriginalExtension();
            $img->move('products', $name);

            $gallery['image'] = $name;
        }

        // $gallery['image'] = $request->file('image')->store('products', 'public');

        Gallery::create($gallery);

        return redirect('/gallery')->with('msg', 'Gambar Berhasil Di Tambahkan !');
    }

    // SHOW
    public function show($id)
    {
        return abort('403', 'Alamat tidak tersedia');
    }

    // EDIT
    public function edit($id)
    {
        return abort('403', 'Alamat tidak tersedia');
    }

    //UPDATE
    public function update(Request $request, $id)
    {
        return abort('403', 'Alamat tidak tersedia');
    }

    // DELETE
    public function destroy($id)
    {
        Gallery::destroy($id);

        return redirect('/gallery')->with('msg', 'Gambar Berhasil Di Hapus');
    }

    //RESTORE
    public function restore()
    {
        Gallery::withTrashed()->restore();

        return redirect('/gallery')->with('msg', 'Gambar Berhasil Di Kembalikan !');
    }
}
