<div class="max-w-lg mx-auto">
    <!-- Message d'erreur -->
        @if (session()->has('error'))
            <div class="mt-6 p-4 bg-red-500 text-white rounded-lg shadow-md">
                {{ session('error') }}
            </div>
        @endif

<!-- Message de succès -->
        @if (session()->has('message'))
            <div class="mt-6 p-4 bg-green-500 text-white rounded-lg shadow-md">
                {{ session('message') }}
            </div>
        @endif
    <div class="max-w-6xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Découvrez nos hébergements</h2>

    <!-- Grille des propriétés -->
    <div class="bg-gray-100 w-full flex justify-center items-center p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach($properties as $index => $property)
                <div class="w-72 p-4 bg-white rounded-xl shadow-lg hover:shadow-2xl transform transition-all hover:-translate-y-2 duration-300">
                    <!-- Image -->
                    <div class="relative">
                        <img class="h-48 w-full object-cover rounded-xl" 
                            src="{{ asset('images/property' . ($index % 4 + 1) . '.jpg') }}" 
                            alt="{{ $property->name }}">
                        
                        <!-- Bouton Réserver sur l'image -->
                        <button wire:click="selectProperty({{ $property->id }})"
                            class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                            Réserver
                         </button>

                    </div>

                    <!-- Contenu -->
                    <div class="p-4 text-center">
                        <h2 class="font-bold text-lg mb-2 text-gray-900">{{ $property->name }}</h2>
                        <p class="text-sm text-gray-600">{{ Str::limit($property->description, 80) }}</p>
                        <p class="text-lg font-semibold">
                            {{ $property->price_per_night }} € par nuit
                        </p>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Modal de réservation -->
    @if($showForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white w-80 p-6 rounded-lg shadow-lg">


                <h5 class="text-lg font-bold text-gray-900 mb-4 text-center">Réserver {{ $selectedProperty->name }}</h5>
                
                <form wire:submit.prevent="book">
                    @csrf
                    <div class="mb-3">
                        <label for="startDate" class="block text-gray-700 font-semibold">Date de début</label>
                        <input type="date" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500" wire:model="startDate" id="startDate" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="endDate" class="block text-gray-700 font-semibold">Date de fin</label>
                        <input type="date" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500" wire:model="endDate" id="endDate" required>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <button type="button" class="text-gray-500 hover:text-gray-700" wire:click="$set('showForm', false)">Annuler</button>
                        <button type="submit" cclass="text-gray-500 hover:text-gray-700">Réserver</button>
                    </div>
                </form>
            </div>
        </div>
        
    @endif

</div>


