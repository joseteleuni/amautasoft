<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use App\Models\Mikrotik;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;

class DidResource extends Resource
{
    protected static ?string $model = Mikrotik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'DID';

        
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('did')->searchable(),
                //TextColumn::make('dominio'),
                //TextColumn::make('ip')->label('Direccion IP'),

            ]) ;
    }

    public static function getPages(): array
    {   

        return [
            'index' => Pages\ListDid::route('/'),
            //'create' => Pages\CreateMikrotik::route('/create'),
            //'view' => Pages\ViewUser::route('/{record}'),
            //'edit' => Pages\EditMikrotik::route('/{record}/edit'),
        ];
    }    

}