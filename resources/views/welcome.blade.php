<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - MonApplication</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper.js pour le slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navigation -->
    <nav class="bg-gray-900 shadow-md p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">MonApplication</h1>

            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-400 text-white rounded-lg shadow-md transition">
                    Se connecter
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 hover:bg-green-400 text-white rounded-lg shadow-md transition">
                    Créer un compte
                </a>
            </div>
        </div>
    </nav>

    <!-- Image principale -->
    <section class="relative h-[450px] flex items-center justify-center">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/chambre.jpg') }}');"></div>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative text-center text-white px-6">
            <h1 class="text-4xl font-bold mb-4">Trouvez l'endroit parfait pour vous</h1>
        </div>
    </section>

    <!-- Swiper.js Slider des hébergements -->
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Découvrez nos hébergements</h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Boucle sur les hébergements -->
                @foreach (['property1.jpg', 'property2.jpg', 'property3.jpg', 'property4.jpg'] as $image)
                <div class="swiper-slide">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/' . $image) }}" class="w-full h-72 object-cover">
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Flèches de navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Pied de page -->
    <footer class="bg-gray-800 text-gray-300 text-center py-6">
        <p>&copy; 2025 MonApplication. Tous droits réservés.</p>
    </footer>

    <!-- Script pour Swiper.js -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

</body>
</html>
