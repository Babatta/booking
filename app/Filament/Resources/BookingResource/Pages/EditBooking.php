<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}


// <?php

// namespace App\Filament\Resources\BookingResource\Pages;

// use App\Filament\Resources\BookingResource;
// use Filament\Pages\Actions;
// use Filament\Resources\Pages\EditRecord;
// use App\Models\Booking;
// use App\Models\User;  // Importer le modèle User
// use App\Models\Property;  // Importer le modèle Property
// use Filament\Forms;

// class EditBooking extends EditRecord
// {
//     protected static string $resource = BookingResource::class;

   
//     public function getRecord(): Booking
//     {
//         return Booking::findOrFail($this->record);
//     }


//     protected function getFormSchema(): array
//     {
//         return [
//             // Sélectionner une propriété
//             Forms\Components\Select::make('property_id')
//                 ->label('Propriété')
//                 ->options(Property::pluck('name', 'id'))  // Charger les propriétés
//                 ->required(),

   
//             Forms\Components\Select::make('user_id') 
//                 ->label('Client')
//                 ->options(User::pluck('name', 'id'))  
//                 ->required(),

          
//             Forms\Components\DatePicker::make('booking_date')
//                 ->label('Date de réservation')
//                 ->required(),
//             Forms\Components\Textarea::make('notes')
//                 ->label('Notes')
//                 ->nullable(), 
//         ];
//     }

//     protected function getRedirectUrl(): string
//     {
//         return $this->getResource()::getUrl('index'); // Redirige vers la liste des bookings
//     }
// }
