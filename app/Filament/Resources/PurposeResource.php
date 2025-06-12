<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurposeResource\Pages;
use App\Filament\Resources\PurposeResource\RelationManagers;
use App\Models\Purpose;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurposeResource extends Resource
{
    protected static ?string $model = Purpose::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Services';
    protected static ?string $navigationGroup = 'Appointment Management';
    protected static ?string $modelLabel = 'Type of services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('faculty_id')
                ->relationship(name: 'Faculty',titleAttribute: 'name')
                ->searchable(true)
                ->preload()
                ->native(false)
                ->required(),
                
                Forms\Components\TextInput::make('name')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('faculty_id')->sortable()->label('Service Number'),
                Tables\Columns\TextColumn::make('name')->sortable()->label('Purpose')->searchable(true),
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
            'index' => Pages\ListPurposes::route('/'),
            'create' => Pages\CreatePurpose::route('/create'),
            'edit' => Pages\EditPurpose::route('/{record}/edit'),
        ];
    }    
}
