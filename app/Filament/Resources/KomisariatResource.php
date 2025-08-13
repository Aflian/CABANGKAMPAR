<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KomisariatResource\Pages;
use App\Models\Komisariat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KomisariatResource extends Resource
{
    protected static ?string $model = Komisariat::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Komisariat';
    protected static ?string $navigationGroup = 'Organisasi';
    protected static ?string $pluralModelLabel = 'Daftar Komisariat';
    protected static ?string $modelLabel = 'Komisariat';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Komisariat')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Komisariat')
                            ->placeholder('Contoh: Komisariat IMM FAI')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Tuliskan deskripsi singkat komisariat...')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->placeholder('Masukkan alamat lengkap komisariat...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Komisariat')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->deskripsi)
                    ->wrap(),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->alamat)
                    ->wrap(),

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
            ->defaultSort('nama', 'asc')
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Detail'),
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Terpilih'),
                ]),
            ])
            ->emptyStateHeading('Belum ada data komisariat')
            ->emptyStateDescription('Tambahkan komisariat baru dengan mengklik tombol "Buat Komisariat".')
            ->emptyStateIcon('heroicon-o-building-office');
    }

    public static function getRelations(): array
    {
        return [
            // Contoh: Relation manager untuk Kader di komisariat ini
            // RelationManagers\UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKomisariats::route('/'),
            'create' => Pages\CreateKomisariat::route('/create'),
            'edit' => Pages\EditKomisariat::route('/{record}/edit'),
        ];
    }
}
