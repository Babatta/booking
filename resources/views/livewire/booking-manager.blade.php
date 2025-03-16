<div class="max-w-lg mx-auto">
    <!-- Affichage du message flash -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Vérifier s'il y a des propriétés -->
    @if ($properties->isEmpty())
        <div class="bg-yellow-500 text-white p-4 mb-4 rounded">
            Aucune propriété n'est disponible pour le moment. Veuillez réessayer plus tard.
        </div>
    @else
        <!-- Formulaire de réservation -->
        <form wire:submit.prevent="book" class="space-y-4">
            <!-- Sélection de la propriété -->
            <div>
                <label for="property" class="block text-sm font-medium text-gray-700">Choisissez une propriété</label>
                <select wire:model="propertyId" id="property" name="property" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="">Sélectionnez une propriété</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->name }} - {{ $property->price_per_night }} € par nuit</option>
                    @endforeach
                </select>
                @error('propertyId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Date de début -->
            <div>
                <label for="startDate" class="block text-sm font-medium text-gray-700">Date de début</label>
                <input type="date" wire:model="startDate" id="startDate" name="startDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                @error('startDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Date de fin -->
            <div>
                <label for="endDate" class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" wire:model="endDate" id="endDate" name="endDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                @error('endDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Bouton de soumission -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                    Réserver
                </button>
            </div>
        </form>
    @endif
</div>
