<!DOCTYPE html>
<html >
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div style="background:#333; color:white; padding:10px; display:flex; justify-content:space-between;">
    <h3>Aplikasi Parkir</h3>

    <div>
        <span>{{ auth()->user()->name ?? 'Guest' }}</span>

        @auth
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @endauth
    </div>
</div>