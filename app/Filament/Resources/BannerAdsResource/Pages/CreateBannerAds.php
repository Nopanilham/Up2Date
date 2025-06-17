<?php

namespace App\Filament\Resources\BannerAdsResource\Pages;

use App\Filament\Resources\BannerAdsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateBannerAds extends CreateRecord
{
    protected static string $resource = BannerAdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back')
                ->url(BannerAdsResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left')
                ->color('info'),
        ];
    }
}
