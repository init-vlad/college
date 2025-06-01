<?php

namespace App\Filament\Teacher\Resources;

use App\Filament\Teacher\Resources\GradeResource\Pages;
use App\Models\Grade;
use App\Models\User;
use App\Models\Subject;
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
        return parent::getEloquentQuery()->where('teacher_id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Студент')
                    ->relationship('student', 'name', fn (Builder $query) => $query->where('role', 'student'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('subject_id')
                    ->label('Предмет')
                    ->relationship('subject', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Hidden::make('teacher_id')
                    ->default(Auth::id()),
                Forms\Components\Select::make('grade')
                    ->label('Оценка')
                    ->required()
                    ->options([
                        2 => '2 (Неудовлетворительно)',
                        3 => '3 (Удовлетворительно)',
                        4 => '4 (Хорошо)',
                        5 => '5 (Отлично)',
                    ]),
                Forms\Components\Select::make('grade_type')
                    ->label('Тип оценки')
                    ->required()
                    ->options(Grade::GRADE_TYPES)
                    ->default('exam'),
                Forms\Components\DatePicker::make('date')
                    ->label('Дата')
                    ->required()
                    ->default(now()),
                Forms\Components\Textarea::make('comment')
                    ->label('Комментарий')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Студент')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('student.group.name')
                    ->label('Группа')
                    ->searchable()
                    ->sortable(),
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
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Комментарий')
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 30) {
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}