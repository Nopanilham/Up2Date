<?php

namespace App\Filament\Resources\BannerAdsResource\Pages;

use App\Filament\Resources\BannerAdsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditBannerAds extends EditRecord
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
                
            Actions\DeleteAction::make(),
        ];
    }
}
