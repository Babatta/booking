<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .visible-button {
            background-color: transparent;
            border: 2px solid transparent;
            color: white;
        }

        .visible-button:hover {
            background-color: rgba(255, 255, 255, 0.1); /* léger fond blanc au survol */
            border-color: white;
            color: white;
        }

        .visible-button-primary {
            border-color: blue;
            color: blue;
        }

        .visible-button-primary:hover {
            background-color: blue;
            color: white;
        }

        .visible-button-secondary {
            border-color: green;
            color: green;
        }

        .visible-button-secondary:hover {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-gray-900 flex justify-center items-center min-h-screen">

    <div class="text-center p-8 bg-white bg-opacity-90 shadow-lg rounded-xl w-full max-w-lg">
        <h1 class="text-4xl font-extrabold text-indigo-700 mb-6">Bienvenue sur notre plateforme</h1>

        <p class="text-lg text-gray-600 mb-8">Votre espace réservé pour des expériences uniques.</p>

        <!-- Les boutons "Se connecter" et "Créer un compte" -->
        <div class="space-y-4">
            <a href="{{ route('login') }}" class="w-full py-3 px-6 visible-button visible-button-primary font-semibold rounded-lg shadow-md transition duration-300">
                Se connecter
            </a>

            <a href="{{ route('register') }}" class="w-full py-3 px-6 visible-button visible-button-secondary font-semibold rounded-lg shadow-md transition duration-300">
                Créer un compte
            </a>
        </div>
    </div>

</body>
</html>
