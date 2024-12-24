<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivreResource\Pages;
use App\Filament\Resources\LivreResource\RelationManagers;
use App\Models\Livre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LivreResource extends Resource
{
    protected static ?string $model = Livre::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('auteur_id')
                    ->relationship('auteur', 'id')
                    ->required(),
                Forms\Components\Select::make('categorie_id')
                    ->relationship('categorie', 'id')
                    ->required(),
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('isbn')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_publication')
                    ->required(),
                Forms\Components\TextInput::make('editeur')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('auteur.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categorie.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('titre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_publication')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('editeur')
                    ->searchable(),
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
            'index' => Pages\ListLivres::route('/'),
            'create' => Pages\CreateLivre::route('/create'),
            'edit' => Pages\EditLivre::route('/{record}/edit'),
        ];
    }
}
