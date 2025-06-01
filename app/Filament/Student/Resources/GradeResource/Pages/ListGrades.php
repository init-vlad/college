<?php

namespace App\Filament\Student\Resources\GradeResource\Pages;

use App\Filament\Student\Resources\GradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGrades extends ListRecords
{
    protected static string $resource = GradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}