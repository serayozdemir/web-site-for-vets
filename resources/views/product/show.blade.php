@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ürün Detayları</h1>
            <p><strong>Ürün Adı:</strong> {{ $product->name }}</p>
            <p><strong>Ürün Açıklaması:</strong> {{ $product->description }}</p>
            <p><strong>Ürün Fiyatı:</strong> {{ $product->price }}</p>
            @if($product->file_path)
                <img src="{{ asset('storage/' . $product->file_path) }}" alt="Ürün Resmi" style="max-width: 300px; max-height: 300px;">
             @else
                <p>Resim Yok</p>
             @endif
        
        

        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection
