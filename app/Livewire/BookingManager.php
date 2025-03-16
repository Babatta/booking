<?php

namespace App\Livewire; // Le bon namespace ici

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $propertyId;
    public $startDate;
    public $endDate;

    public function render()
    {
        // Récupère toutes les propriétés depuis la base de données
        $properties = Property::all();

        return view('livewire.booking-manager', compact('properties'));
    }

    public function book()
    {
        // Logique de réservation
        $this->validate([
            'propertyId' => 'required|exists:properties,id',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
        ]);

        // Création de la réservation (ajustée selon ta logique)
        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        // Réinitialisation des champs
        $this->reset(['propertyId', 'startDate', 'endDate']);

        // Message flash de succès
        session()->flash('message', 'Réservation effectuée avec succès.');
    }
}