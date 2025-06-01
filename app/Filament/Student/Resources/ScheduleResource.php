<?php

namespace App\Filament\Student\Resources;

use App\Filament\Student\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $modelLabel = 'Занятие';
    protected static ?string $pluralModelLabel = 'Расписание';
    protected static ?string $navigationLabel = 'Расписание';
    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();
        return parent::getEloquentQuery()->where('group_id', $user->group_id);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day_of_week')
                    ->label('День')
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
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Время')
                    ->formatStateUsing(fn ($record) => $record->start_time->format('H:i') . ' - ' . $record->end_time->format('H:i'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Предмет')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Преподаватель')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classroom')
                    ->label('Аудитория')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('day_of_week')
                    ->label('День недели')
                    ->options([
                        'Понедельник' => 'Понедельник',
                        'Вторник' => 'Вторник',
                        'Среда' => 'Среда',
                        'Четверг' => 'Четверг',
                        'Пятница' => 'Пятница',
                        'Суббота' => 'Суббота',
                    ]),
                Tables\Filters\SelectFilter::make('subject_id')
                    ->label('Предмет')
                    ->relationship('subject', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('day_of_week')
            ->defaultSort('start_time');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
        ];
    }
}
