<?php

namespace App\Livewire;

use Livewire\Component;

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $propertyId;
    public $startDate;
    public $endDate;

    public function book()
    {
        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès.');
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
