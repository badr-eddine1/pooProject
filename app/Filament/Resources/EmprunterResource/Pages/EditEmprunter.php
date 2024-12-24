<?php

namespace App\Filament\Resources\EmprunterResource\Pages;

use App\Filament\Resources\EmprunterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmprunter extends EditRecord
{
    protected static string $resource = EmprunterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
