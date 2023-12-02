@extends('app')

@section('title', 'Vet | Verify your email')

@section('content')
<main class="py-5">
    <div class="container">
        <h1 class="h5 mb-3">
            Welcome
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status') == 'doğrulama linki gönderildi')
                            <div class="alert alert-success">Email doğrulama e-postanız gönderildi.</div>
                        @endif
                        <p class="mb-0"><strong>Kayıt olduğunuz için teşekkürler!</strong> Başlamadan önce lütfen email adresinizi 
                            gönderdiğimiz eposta üzerindeki linke tıklayarak doğrulayın. </p>
                        <p class="mb-0">Eğer doğrulama mailini almadıysanız tekrar göndereceğiz.</p>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary mt-3">Doğrulama kodunu tekrar gönder.</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection