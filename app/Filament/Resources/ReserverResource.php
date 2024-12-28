<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReserverResource\Pages;
use App\Filament\Resources\ReserverResource\RelationManagers;
use App\Models\Reserver;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReserverResource extends Resource
{
    protected static ?string $model = Reserver::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\Select::make('livre_id')
                ->relationship('livre', 'titre')
                ->required(),
            Forms\Components\DatePicker::make('date_emprunt')
                ->required(),
            Forms\Components\DatePicker::make('date_retour_prevu')
                ->required(),
            Forms\Components\DatePicker::make('date_retour_effectif'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('livre.id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('date_emprunt')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('date_retour_prevu')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('date_retour_effectif')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListReservers::route('/'),
            'create' => Pages\CreateReserver::route('/create'),
            'edit' => Pages\EditReserver::route('/{record}/edit'),
        ];
    }
}
