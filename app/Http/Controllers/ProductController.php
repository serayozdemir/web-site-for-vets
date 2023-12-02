<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

   

    public function create(Request $request)
    {
        $product = new Product(); // Boş bir Product modeli oluştur
        return view('product.create', compact('product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'file' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' =>'required|string|max:255',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('/uploads', $fileName, 'public'); 
        } else {
            return back()->with('error', 'Resim yükleme sırasında bir hata oluştu.');
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->title = $request->input('title');
        $product->file_path = $filePath ?? null;
        $product->save();

        return redirect()->route('product.create')->with('message', 'Ürün başarıyla oluşturuldu.');

    }
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        try {
            $product = Product::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('product.index')->with('error', 'Ürün bulunamadı.');
        }
        
        return view('product.show', compact('product'));
    }

    
}
