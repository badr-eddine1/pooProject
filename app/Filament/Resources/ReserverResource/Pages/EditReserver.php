<?php

namespace App\Filament\Resources\ReserverResource\Pages;

use App\Filament\Resources\ReserverResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReserver extends EditRecord
{
    protected static string $resource = ReserverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
