<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advent Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Advent Calendar Quotes</h1>
            <p class="lead">Current Time: {{ $currentTime->format('Y-m-d H:i:s') }}</p>
        </div>
        <div class="row">
            @php
                $quotesCount = count($quotes);
            @endphp

            @if($quotesCount > 0)
                @for ($i = 0; $i < $quotesCount; $i++)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{ $quotes[$i]->text }}</p>
                                    <footer class="blockquote-footer">{{ $quotes[$i]->author }}</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                <p>No quotes available.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('subg') }}" class="btn btn-primary">Перейти на страницу</a>
</body>
</html>
