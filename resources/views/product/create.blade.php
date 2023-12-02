@extends('app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Ürünün Adı</label>
                <div class="col-md-9">
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-3 col-form-label">Ürünün Açıklaması</label>
                <div class="col-md-9">
                    <input type="text" name="description" id="description" value="{{ old('description', $product->description) }}" class="form-control @error('description') is-invalid @enderror">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-md-3 col-form-label">Ürünün Fiyatı</label>
                <div class="col-md-9">
                    <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="file" class="col-md-3 col-form-label">File</label>
                <input type="file" name="file" id="file" class="form-control-file">
                @error('file')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="title" class="col-md-3 col-form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">{{$product->exists ? "Update": "Save"}}</button>
                    <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </form>
       

    </div>
</div>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection