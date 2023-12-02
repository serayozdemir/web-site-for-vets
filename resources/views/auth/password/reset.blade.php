<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifreyi Sıfırla</title>
</head>
<body>
    <h1>Şifreyi Sıfırla</h1>
    
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
    
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        
        <label for="password">Yeni Şifre</label>
        <input id="password" type="password" name="password" required>
        
        <label for="password-confirm">Yeni Şifre Onayı</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>
        
        <button type="submit">Şifreyi Sıfırla</button>
    </form>
</body>
</html>
