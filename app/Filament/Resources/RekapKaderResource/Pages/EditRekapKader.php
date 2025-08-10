<?php

namespace App\Filament\Resources\RekapKaderResource\Pages;

use App\Filament\Resources\RekapKaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekapKader extends EditRecord
{
    protected static string $resource = RekapKaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
