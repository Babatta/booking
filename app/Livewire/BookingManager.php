<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class BookingManager extends Component
{
    public $properties;
    public $propertyId;
    public $startDate;
    public $endDate;
    public $selectedProperty;
    public $showForm = false;

    public function mount()
    {
        $this->properties = Property::all(); // Récupérer toutes les propriétés dès le chargement du composant
    }

    public function render()
    {
        return view('livewire.booking-manager', [
            'properties' => $this->properties
        ]);
    }

    public function selectProperty($propertyId)
    {
        $this->propertyId = $propertyId;
        $this->selectedProperty = Property::find($propertyId);
        $this->showForm = true; // Afficher le formulaire
    }

    public function book()
    {
        $this->validate([
            'propertyId' => 'required|exists:properties,id',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        Mail::to(auth()->user()->email)->send(new BookingConfirmation($booking));

        $this->reset(['propertyId', 'startDate', 'endDate', 'showForm']);
        session()->flash('message', 'Réservation effectuée avec succès. Un email de confirmation vous a été envoyé.');
    }
}
