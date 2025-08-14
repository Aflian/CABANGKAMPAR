<?php

namespace App\Filament\Kader\Resources\PostResource\Pages;

use App\Filament\Kader\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
