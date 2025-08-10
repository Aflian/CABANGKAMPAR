<?php

namespace App\Filament\Resources\RekapKaderResource\Pages;

use App\Filament\Resources\RekapKaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekapKaders extends ListRecords
{
    protected static string $resource = RekapKaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
