<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subscribe to Daily Quotes</title>
</head>
<body>
    <h1>Subscribe to Daily Quotes</h1>
    <form action="/subscribe" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
    </form>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <a href="{{ route('index') }}" class="btn btn-primary">Перейти на страницу</a>
    <form action="{{ route('send.daily.quotes') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Send Daily Quotes</button>
    </form>
</body>
</html>
