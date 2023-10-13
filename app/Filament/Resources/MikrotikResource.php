<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MikrotikResource\Pages;
use App\Filament\Resources\MikrotikResource\RelationManagers;
use App\Models\Mikrotik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
//use Filament\Actions\CreateAction;
use Filament\Forms\Components\Section;
use Filament\Pages\Actions\CreateAction;

// Fields
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Checkbox;
use Filament\Infolists\Components\Section as SectionFill;


class MikrotikResource extends Resource
{
    protected static ?string $model = Mikrotik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make('Configuracion basica')
                ->schema([
                    // ...
                    TextInput::make('nombre')->required()->maxLength(30),
                    TextInput::make('code')->required()->maxLength(30),
                    TextInput::make('did')->numeric()->required()->maxLength(30),
                    Select::make('implementacion')
                        ->options([
                            'directo' => 'Directo',
                            'dni-pin' => 'DNI-PIN',
                            'saldo' => 'Saldo',
                        ])->required(),
                    TextInput::make('num_tpe')->required()->numeric()->maxValue(10000),
                ])->columns(2),
                Section::make('Implementacion')
                ->schema([
                    // ...
                    Checkbox::make('shelly'),
                    Checkbox::make('starlink'),
                    Checkbox::make('fibra'),
                ])->columns(2),
                
               
                //Hidden::make('puerto')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nombre')->searchable(),
                //TextColumn::make('did')->searchable(),
                TextColumn::make('dominio'),
                //TextColumn::make('ip')->label('Direccion IP'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()->label('Borrar'),
                ]),
            ]);
    }
    
     
        public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                SectionFill::make('Configuracion basica')
                ->schema([
                    // ...
                    TextEntry::make('nombre'),
                    TextEntry::make('code'),
                    TextEntry::make('did'),
                    TextEntry::make('implementacion'),
                    TextEntry::make('num_tpe'),
                    TextEntry::make('dominio'),
                    TextEntry::make('puerto_winbox'),
                    TextEntry::make('puerto_pbx'),
                ])->columns(2),
                SectionFill::make('Implementacion')
                ->schema([
                    // ...
                    TextEntry::make('shelly'),
                    TextEntry::make('starlink'),
                    TextEntry::make('fibra'),
                ])->columns(2),

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
            'index' => Pages\ListMikrotiks::route('/'),
            'create' => Pages\CreateMikrotik::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditMikrotik::route('/{record}/edit'),
        ];
    }    
}
