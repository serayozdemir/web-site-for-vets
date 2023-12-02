<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'file_path'];

    // Diğer işlevler ve ilişkiler burada tanımlanabilir

    public function fileUrl()
    {
        return asset('public/storage/uploads' . $this->image);
    }

    public function permalink()
    {
        return route('product.show', $this->id);
    }
}
