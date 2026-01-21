<?php

namespace App\Filament\Resources\DeveloperRecommendations\Pages;

use App\Filament\Resources\DeveloperRecommendations\DeveloperRecommendationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDeveloperRecommendation extends ViewRecord
{
    protected static string $resource = DeveloperRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
