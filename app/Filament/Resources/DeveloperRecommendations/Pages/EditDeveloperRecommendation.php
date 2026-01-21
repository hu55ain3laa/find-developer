<?php

namespace App\Filament\Resources\DeveloperRecommendations\Pages;

use App\Filament\Resources\DeveloperRecommendations\DeveloperRecommendationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDeveloperRecommendation extends EditRecord
{
    protected static string $resource = DeveloperRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
