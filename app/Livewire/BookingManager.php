<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Log;

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
        $this->showForm = true; 
    }
    public function book()
    {
        Log::info('Méthode book() appelée');
    
        $this->validate([
            'propertyId' => 'required|exists:properties,id',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
        ]);
    
        // Vérifier si la propriété est déjà réservée sur ces dates
        $isAlreadyBooked = Booking::where('property_id', $this->propertyId)
            ->where(function ($query) {
                $query->whereBetween('start_date', [$this->startDate, $this->endDate])
                      ->orWhereBetween('end_date', [$this->startDate, $this->endDate])
                      ->orWhere(function ($query) {
                          $query->where('start_date', '<=', $this->startDate)
                                ->where('end_date', '>=', $this->endDate);
                      });
            })
            ->exists();
    
        if ($isAlreadyBooked) {
            session()->flash('error', 'Cette propriété est déjà réservée pour cette période.');
            return;
        }
    
        // Créer la réservation
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);
    
        // Envoyer un email de confirmation
        Mail::to(auth()->user()->email)->send(new BookingConfirmation($booking));
    
        session()->flash('message', 'Réservation effectuée avec succès. Un email de confirmation vous a été envoyé.');
    
        // Réinitialiser les valeurs du formulaire
        $this->reset(['propertyId', 'startDate', 'endDate', 'showForm']);
    }
    
}
