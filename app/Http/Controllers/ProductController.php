<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Class Validasi Request
use App\Http\Requests\ProductRequest;

// Helper String
use Illuminate\Support\Str;

// Import DB Product
use App\Models\Product;

// Import DB Gallery
use App\Models\Gallery;

class ProductController extends Controller
{
    // READ
    public function index()
    {
        $products =  Product::orderBy('id', 'DESC')->get();

        return view('dashboard.product', compact('products'));
    }

    // CREATE URL
    public function create()
    {
        return view('dashboardCreate.product_create');
    }

    // STORE
    public function store(ProductRequest $request)
    {
        $product         = $request->all();

        $product['slug'] = Str::slug($request->name);

        // Slug yang sama
        if (Product::where('slug', $product['slug'])->first() == !null) {
            $product['slug'] = Str::slug($request->name. '-' . time());
        }

        Product::create($product);

        return redirect('/product')->with('msg', 'Barang Berhasil ditambahkan !');
    }

    //READ SHOW
    public function show($id)
    {
        return abort('403', 'Halaman ini tidak tersedia');
    }

    // EDIT
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('dashboardEdit.product_edit', compact('product'));
    }

    //UPDATE
    public function update(ProductRequest $request, $id)
    {
        $product = $request->all();

        $product['slug'] = Str::slug($request->name);

        // Slug yang sama
        if (Product::where('slug', $product['slug'])->first() == !null) {
            $product['slug'] = Str::slug($request->name. '-' . time());
        }

        Product::findOrFail($id)->update($product);

        return redirect('/product')->with('msg', 'Barang Berhasil Di Ubah !');
    }

    // DELETE
    public function destroy($id)
    {
        Product::destroy($id);

        Gallery::where('product_id', $id)->delete();

        return redirect('product')->with('msg', 'Barang Berhasil Di Hapus !');
    }

    // RESTORE
    public function restore()
    {
        Product::withTrashed()->restore();

        return redirect('product')->with('msg', 'Barang Berhasil Di Kembalikan !');
    }

    // IMAGE GALLERY
    public function image($id)
    {
        $product = Product::with('galleries')->where('id', $id)->first();

        return view('dashboard.show_gallery', compact('product'));
    }
}
