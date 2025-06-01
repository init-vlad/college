<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Group;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $modelLabel = 'Занятие';
    protected static ?string $pluralModelLabel = 'Расписание';
    protected static ?string $navigationLabel = 'Расписание';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->label('Предмет')
                    ->relationship('subject', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->label('Преподаватель')
                    ->relationship('teacher', 'name', fn (Builder $query) => $query->where('role', 'teacher'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('group_id')
                    ->label('Группа')
                    ->relationship('group', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('day_of_week')
                    ->label('День недели')
                    ->required()
                    ->options([
                        'Понедельник' => 'Понедельник',
                        'Вторник' => 'Вторник',
                        'Среда' => 'Среда',
                        'Четверг' => 'Четверг',
                        'Пятница' => 'Пятница',
                        'Суббота' => 'Суббота',
                    ]),
                Forms\Components\TimePicker::make('start_time')
                    ->label('Время начала')
                    ->required()
                    ->seconds(false),
                Forms\Components\TimePicker::make('end_time')
                    ->label('Время окончания')
                    ->required()
                    ->seconds(false)
                    ->after('start_time'),
                Forms\Components\TextInput::make('classroom')
                    ->label('Аудитория')
                    ->maxLength(255),
            ]);
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
                Tables\Columns\TextColumn::make('group.name')
                    ->label('Группа')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('classroom')
                    ->label('Аудитория')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\SelectFilter::make('teacher_id')
                    ->label('Преподаватель')
                    ->relationship('teacher', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('group_id')
                    ->label('Группа')
                    ->relationship('group', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Редактировать'),
                Tables\Actions\DeleteAction::make()
                    ->label('Удалить'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Удалить выбранные'),
                ]),
            ])
            ->defaultSort('day_of_week')
            ->defaultSort('start_time');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
