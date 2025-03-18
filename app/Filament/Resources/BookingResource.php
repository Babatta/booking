<?php

// app/Filament/Resources/BookingResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\User;  
use App\Models\Property; 
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Champ Property (Propriété) charge l'ensemble des proprietés 
                Forms\Components\Select::make('property_id')
                    ->label('Propriété')
                    ->options(Property::pluck('name', 'id')) 
                    ->required(),

                // Champ User (Nom du client)
                Forms\Components\Select::make('user_id') 
                    ->label('Client')
                    ->options(User::pluck('name', 'id'))  // Charger les utilisateurs
                    ->required(),
                
                Forms\Components\DatePicker::make('start_date')
                    ->label('Date de début') // Utilisation de start_date au lieu de booking_date
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('Date de fin')
                    ->required()
                ]);

                // Champ Notes
            //     Forms\Components\Textarea::make('notes')
            //         ->label('Notes')  // Optionnel
            //         ->nullable(),
            // ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('property.name')
                    ->label('Propriété')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')  // Afficher le nom du client
                    ->label('Nom du client')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('booking_date')
                    ->label('Date de réservation')
                    ->sortable(),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Notes')
                    ->sortable(),
            ])
            ->filters([
                // Ajouter des filtres ici si nécessaire
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
