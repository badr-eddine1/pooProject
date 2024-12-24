<?php

namespace App\Filament\Resources\EmprunterResource\Pages;

use App\Filament\Resources\EmprunterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmprunters extends ListRecords
{
    protected static string $resource = EmprunterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
