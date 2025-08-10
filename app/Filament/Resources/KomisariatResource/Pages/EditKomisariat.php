<?php

namespace App\Filament\Resources\KomisariatResource\Pages;

use App\Filament\Resources\KomisariatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKomisariat extends EditRecord
{
    protected static string $resource = KomisariatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
