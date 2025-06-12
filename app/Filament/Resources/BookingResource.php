<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Tables;
use Filament\Tables\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Purpose;
use Filament\Forms\Get;
use App\Services\BookingService;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\DateTimePicker;


class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationLabel = 'Book an Appointment';
    protected static ?string $modelLabel = 'Appointments';
    protected static ?string $navigationGroup = 'Booking Management';

    public static function form(Form $form): Form
    {
        $dateFormat = 'Y-m-d';
        return $form
            ->schema([
                Components\Section::make('User Details')->columns(2)->schema([
                    Components\TextInput::make('stdnt_id')
                        ->numeric()
                        ->inputMode('numeric')
                        ->minLength(9)
                        ->maxLength(10)
                        ->required(),

                    Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                ]),

                Components\Section::make('Appointment Details')->columns(3)->schema([
                    Components\Select::make('department_id')
                        ->label('Department')
                        ->relationship('department', 'name')
                        ->searchable(true)
                        ->preload()
                        ->live()
                        ->native(false)
                        ->required()
                        ->reactive(),

                    Components\Select::make('faculty_id')
                        ->label('Faculty')
                        ->options(fn (Get $get): Collection => Faculty::query()
                            ->where('department_id', $get('department_id'))
                            ->pluck('name', 'id'))
                        ->searchable(true)
                        ->preload()
                        ->live()
                        ->native(false)
                        ->required()
                        ->reactive(),

                    Components\Select::make('purpose_id')
                        ->label('Purpose')
                        ->options(fn (Get $get): Collection => Purpose::query()
                            ->where('faculty_id', $get('faculty_id'))
                            ->pluck('name', 'id'))
                        ->live()
                        ->searchable(true)
                        ->preload()
                        ->native(false)
                        ->required(),

                    Components\DatePicker::make('date')
                        ->minDate(now()->format($dateFormat))
                        ->maxDate(now()->addWeeks(2)->format($dateFormat))
                        ->required()
                        ->live(),
                    TimePicker::make('time')
                        ->datalist([
                            '09:00',
                            '09:30',
                            '10:00',
                            '10:30',
                            '11:00',
                            '11:30',
                            '12:00',
                        ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('stdnt_id')
        ->sortable()
        ->label('Student ID')
        ->searchable(true),

    Tables\Columns\TextColumn::make('name')
        ->sortable()
        ->label('Name')
        ->searchable(true),

    Tables\Columns\TextColumn::make('department.name')
        ->sortable()
        ->label('Office')
        ->searchable(true),

    Tables\Columns\TextColumn::make('faculty.name')
        ->sortable()
        ->label('Faculty Member')
        ->searchable(true),

    Tables\Columns\TextColumn::make('purpose.name')
        ->sortable()
        ->label('Purpose')
        ->searchable(true),

    Tables\Columns\TextColumn::make('date')
        ->sortable()
        ->label('Date')
        ->searchable(true),

    Tables\Columns\TextColumn::make('time')
        ->sortable()
        ->label('Time')
        ->searchable(true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }    
}
