<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiKaderResource\Pages;
use App\Models\PrestasiKader;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PrestasiKaderResource extends Resource
{
    protected static ?string $model = PrestasiKader::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'Prestasi Kader';
    protected static ?string $navigationGroup = 'Postingan';
    protected static ?string $pluralModelLabel = 'Daftar Prestasi Kader';
    protected static ?string $modelLabel = 'Prestasi Kader';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->label('Nama Kader')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('nama_prestasi')
                ->label('Nama Prestasi')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('tingkat')
                ->label('Tingkat')
                ->options([
                    'kabupaten' => 'Kabupaten',
                    'provinsi' => 'Provinsi',
                    'nasional' => 'Nasional',
                    'internasional' => 'Internasional',
                ])
                ->required(),

            Forms\Components\TextInput::make('tahun')
                ->label('Tahun')
                ->numeric()
                ->minValue(1900)
                ->maxValue(date('Y'))
                ->required(),

            Forms\Components\Textarea::make('keterangan')
                ->label('Keterangan')
                ->maxLength(65535)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Kader')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_prestasi')
                    ->label('Nama Prestasi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tingkat')
                    ->label('Tingkat')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrestasiKaders::route('/'),
            'create' => Pages\CreatePrestasiKader::route('/create'),
            'edit' => Pages\EditPrestasiKader::route('/{record}/edit'),
        ];
    }
}
