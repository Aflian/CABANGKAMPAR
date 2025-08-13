<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekapKaderResource\Pages;
use App\Models\RekapKader;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RekapKaderResource extends Resource
{
    protected static ?string $model = RekapKader::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Rekap Kader';
    protected static ?string $navigationGroup = 'Kader';
    protected static ?string $pluralModelLabel = 'Rekap Data Kader';
    protected static ?string $modelLabel = 'Rekap Kader';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Rekap')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Nama Kader')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->placeholder('Pilih kader...'),

                        Forms\Components\TextInput::make('kegiatan')
                            ->label('Nama Kegiatan')
                            ->placeholder('Contoh: Pelatihan Kepemimpinan Dasar')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal Kegiatan')
                            ->displayFormat('d M Y')
                            ->required(),

                        Forms\Components\Textarea::make('keterangan')
                            ->label('Keterangan Tambahan')
                            ->placeholder('Tuliskan keterangan tambahan kegiatan jika ada...')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Kader')
                    ->sortable()
                    ->searchable()
                    ->color('primary')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('kegiatan')
                    ->label('Kegiatan')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tanggal', 'desc')
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
            ->emptyStateHeading('Belum ada data rekap kader')
            ->emptyStateDescription('Tambahkan rekap kegiatan kader dengan mengklik tombol "Buat Rekap Kader".')
            ->emptyStateIcon('heroicon-o-clipboard-document-check');
    }

    public static function getRelations(): array
    {
        return [
            // Contoh: RelationManagers\PrestasiKaderRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekapKaders::route('/'),
            'create' => Pages\CreateRekapKader::route('/create'),
            'edit' => Pages\EditRekapKader::route('/{record}/edit'),
        ];
    }
}
