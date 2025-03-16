<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex justify-center items-center min-h-screen">

    <div class="text-center p-6 bg-white shadow-md rounded-md">
        <h1 class="text-2xl font-bold text-primary mb-4">Bienvenue sur notre plateforme</h1>

        @if (Route::has('login'))
            <div class="mb-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-primary text-white px-4 py-2 rounded">Accéder au Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Se connecter
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                        Créer un compte
                    </a>
                @endauth
            </div>
        @endif
    </div>

</body>
</html>
