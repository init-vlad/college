<?php

namespace App\Filament\Student\Resources;

use App\Filament\Student\Resources\GradeResource\Pages;
use App\Models\Grade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $modelLabel = 'Оценка';
    protected static ?string $pluralModelLabel = 'Мои оценки';
    protected static ?string $navigationLabel = 'Мои оценки';
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('student_id', Auth::id());
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
                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Предмет')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grade')
                    ->label('Оценка')
                    ->badge()
                    ->color(fn (int $state): string => match ($state) {
                        5 => 'success',
                        4 => 'warning',
                        3 => 'info',
                        2 => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (int $state): string => (string) $state)
                    ->sortable(),
                Tables\Columns\TextColumn::make('grade_type')
                    ->label('Тип')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Grade::GRADE_TYPES[$state] ?? $state),
                Tables\Columns\TextColumn::make('teacher.name')
                    ->label('Преподаватель')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Комментарий')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('grade')
                    ->label('Оценка')
                    ->options([
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ]),
                Tables\Filters\SelectFilter::make('grade_type')
                    ->label('Тип оценки')
                    ->options(Grade::GRADE_TYPES),
                Tables\Filters\SelectFilter::make('subject_id')
                    ->label('Предмет')
                    ->relationship('subject', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('date_range')
                    ->label('Период')
                    ->form([
                        Forms\Components\DatePicker::make('date_from')
                            ->label('С'),
                        Forms\Components\DatePicker::make('date_to')
                            ->label('По'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['date_to'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
        ];
    }
}
