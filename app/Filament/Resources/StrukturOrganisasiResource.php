<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Models\StrukturOrganisasi;
use App\Models\Komisariat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Organisasi';
    protected static ?string $navigationLabel = 'Struktur Organisasi';
    protected static ?string $pluralModelLabel = 'Struktur Organisasi';
    protected static ?string $modelLabel = 'Struktur Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Anggota')
                    ->placeholder('Masukkan nama lengkap')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan')
                    ->placeholder('Masukkan jabatan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('urutan')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Gunakan angka kecil untuk urutan teratas.'),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('struktur-organisasi')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imagePreviewHeight('150')
                    ->nullable(),

                Forms\Components\Select::make('komisariat_id')
                    ->label('Komisariat')
                    ->relationship('komisariat', 'nama')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('periode')
                    ->label('Periode')
                    ->placeholder('Contoh: 2023-2024')
                    ->maxLength(50)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-user.png'))
                    ->height(50),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Anggota')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('komisariat.nama')
                    ->label('Komisariat')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('periode')
                    ->label('Periode')
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
            ->defaultSort('urutan', 'asc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit' => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}
