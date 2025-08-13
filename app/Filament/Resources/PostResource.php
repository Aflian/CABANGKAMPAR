<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Postingan';
    protected static ?string $navigationGroup = 'Postingan';
    protected static ?string $pluralModelLabel = 'Daftar Postingan';
    protected static ?string $modelLabel = 'Postingan';

    /**
     * Ambil daftar kategori dari enum di database
     */
    protected static function getCategoryOptions(): array
    {
        $type = DB::select("SHOW COLUMNS FROM posts WHERE Field = 'category'")[0]->Type;
        preg_match("/^enum\('(.*)'\)$/", $type, $matches);
        return isset($matches[1])
            ? array_combine(
                $values = explode("','", $matches[1]),
                $values
            )
            : [];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(fn($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Textarea::make('content')
                    ->label('Konten')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),

                Select::make('category')
                    ->label('Kategori')
                    ->options(self::getCategoryOptions())
                    ->required(),

                // Author otomatis user login
                Select::make('author_id')
                    ->label('Penulis')
                    ->options(User::pluck('name', 'id'))
                    ->default(auth()->id())
                    ->disabled()
                    ->dehydrated(true) // tetap tersimpan meski disabled
                    ->required(),

                    FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->directory('posts') // folder penyimpanan
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->nullable(),


                DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('author.name')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Dipublikasikan')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
