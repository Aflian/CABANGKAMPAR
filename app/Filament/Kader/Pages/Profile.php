<?php

namespace App\Filament\Kader\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;


class Profile extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.kader.pages.profile';
    protected static ?string $title = 'Profil Saya';

    public ?array $data = [];

    public function mount(): void
    {
        $user = Auth::user();
        $this->form->fill($user->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lengkap')
                    ->required(),

                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat'),

                Forms\Components\TextInput::make('telepon')
                    ->label('Telepon'),

                Forms\Components\TextInput::make('tempatLahir')
                    ->label('Tempat Lahir'),

                Forms\Components\DatePicker::make('taggalLahir')
                    ->label('Tanggal Lahir'),

                Forms\Components\TextInput::make('perkaderan')
                    ->label('Perkaderan'),

                Forms\Components\TextInput::make('universitas')
                    ->label('Universitas'),

                Forms\Components\FileUpload::make('photo')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('photos')
                    ->imageEditor(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $user = Auth::user();
        $user->update($this->form->getState());

        $this->notify('success', 'Profil berhasil diperbarui!');
    }
}
