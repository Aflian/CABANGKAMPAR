<?php

namespace App\Filament\Resources\PrestasiKaderResource\Pages;

use App\Filament\Resources\PrestasiKaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrestasiKader extends EditRecord
{
    protected static string $resource = PrestasiKaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
