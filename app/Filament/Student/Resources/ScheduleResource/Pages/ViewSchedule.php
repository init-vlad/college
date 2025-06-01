<?php

namespace App\Filament\Student\Resources\ScheduleResource\Pages;

use App\Filament\Student\Resources\ScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewSchedule extends ViewRecord
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('← Вернуться к расписанию')
                ->url(fn () => static::getResource()::getUrl('index'))
                ->color('gray'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Информация о занятии')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\TextEntry::make('subject.name')
                                    ->label('Предмет')
                                    ->size('lg')
                                    ->weight('bold')
                                    ->icon('heroicon-o-book-open'),

                                Infolists\Components\TextEntry::make('teacher.name')
                                    ->label('Преподаватель')
                                    ->size('lg')
                                    ->icon('heroicon-o-user'),
                            ]),
                    ]),

                Infolists\Components\Section::make('Время и место')
                    ->schema([
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('day_of_week')
                                    ->label('День недели')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'Понедельник' => 'success',
                                        'Вторник' => 'warning',
                                        'Среда' => 'info',
                                        'Четверг' => 'danger',
                                        'Пятница' => 'gray',
                                        'Суббота' => 'primary',
                                        default => 'gray',
                                    }),

                                Infolists\Components\TextEntry::make('time_range')
                                    ->label('Время')
                                    ->formatStateUsing(fn ($record) =>
                                        $record->start_time->format('H:i') . ' - ' .
                                        $record->end_time->format('H:i')
                                    )
                                    ->icon('heroicon-o-clock'),

                                Infolists\Components\TextEntry::make('classroom')
                                    ->label('Аудитория')
                                    ->badge()
                                    ->color('gray')
                                    ->icon('heroicon-o-map-pin'),
                            ]),
                    ]),

                Infolists\Components\Section::make('Дополнительная информация')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\TextEntry::make('group.name')
                                    ->label('Группа')
                                    ->icon('heroicon-o-user-group'),

                                Infolists\Components\TextEntry::make('subject.description')
                                    ->label('Описание предмета')
                                    ->placeholder('Описание не указано')
                                    ->icon('heroicon-o-document-text'),
                            ]),

                        Infolists\Components\TextEntry::make('duration')
                            ->label('Продолжительность')
                            ->formatStateUsing(function ($record) {
                                $start = $record->start_time;
                                $end = $record->end_time;
                                $duration = $start->diff($end);
                                return $duration->format('%h ч %i мин');
                            })
                            ->icon('heroicon-o-clock'),
                    ]),
            ]);
    }
}
