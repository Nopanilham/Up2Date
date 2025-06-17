<?php

namespace App\Filament\Resources\ArticleNewsResource\Pages;

use App\Filament\Resources\ArticleNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateArticleNews extends CreateRecord
{
    protected static string $resource = ArticleNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back')
                ->url(ArticleNewsResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left')
                ->color('info'),
        ];
    }
}
