<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Kader';
    protected static ?string $navigationLabel = 'Manajemen Kader';
    protected static ?string $pluralModelLabel = 'Data Kader';
    protected static ?string $modelLabel = 'Kader';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => !empty($state) ? bcrypt($state) : null)
                    ->required(fn ($record) => $record === null)
                    ->maxLength(255),

                Select::make('roles')
                    ->label('Peran')
                    ->options([
                        'admin' => 'Admin',
                        'kader' => 'Kader',
                    ])
                    ->default('kader')
                    ->required(),

                DateTimePicker::make('email_verified_at')
                    ->label('Email Terverifikasi')
                    ->nullable(),

                TextInput::make('remember_token')
                    ->label('Remember Token')
                    ->maxLength(100)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\BadgeColumn::make('roles')
                    ->label('Peran')
                    ->colors([
                        'success' => 'admin',
                        'primary' => 'kader',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Diubah')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
