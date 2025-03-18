<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nom de la propriété')
                ->required(),

            Forms\Components\TextInput::make('address')
                ->label('Adresse')
                ->required(),

            Forms\Components\Textarea::make('description')
                ->label('Description'),

               // corresction
                Forms\Components\TextInput::make('price_per_night')
                    ->label('Prix par nuit')
                    ->required()
                    ->numeric() 
                    ->maxLength(8), 


            Forms\Components\DatePicker::make('available_from')
                ->label('Disponible à partir de')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nom')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('address')
                ->label('Adresse')
                ->sortable()
                ->searchable(),

                // Remplacement dans la table aussi
                Tables\Columns\TextColumn::make('price_per_night')
                    ->label('Prix par nuit')
                    ->sortable(),

            Tables\Columns\TextColumn::make('available_from')
                ->label('Disponible depuis')
                ->sortable(),
        ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
