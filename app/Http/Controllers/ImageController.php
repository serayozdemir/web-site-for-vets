<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
//use App\Models\Product;

class ImageController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sadece resim dosyalarına izin veriyoruz (jpg, png, gif) ve maksimum 2MB boyutunda olmalı
        'title' => 'required|string|max:255',
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public'); // uploads klasörü altında saklamayı varsayıyoruz
    } else {
        return back()->with('error', 'Resim yükleme sırasında bir hata oluştu.');
    }

    $image = new Image();
    $image->title = $request->input('title');
    $image->file_path = $filePath ?? null; // Dosya yükleme başarılıysa yol, değilse null
    $image->save();

    return back()->with('message', 'Resim başarıyla yüklendi.');
}
}
