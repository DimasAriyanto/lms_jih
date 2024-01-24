<?php

namespace App\Filament\App\Resources\PendaftaranResource\Pages;

use App\Filament\App\Resources\PendaftaranResource;
use App\Models\Pelatihan;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;

class ViewPendaftaranPelatihan extends ViewRecord
{
    protected static string $resource = PendaftaranResource::class;

    protected static ?string $model = Pelatihan::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('nama')
                            ->required(),
                        Select::make('kategori_id')
                            ->relationship(name: 'kategori', titleAttribute: 'nama')
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->required(),
                        Textarea::make('deskripsi')
                            ->columnSpan('full')
                            ->required(),
                    ])->columns(2),

                Section::make('Image')
                    ->schema([
                        FileUpload::make('image_url')
                            ->hiddenLabel()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('uploads')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240)
                            ->required(),
                    ]),

                Section::make('Waktu dan Tempat Pelaksanaan')
                    ->schema([
                        TextInput::make('tempat_pelaksanaan')
                            ->required(),
                        DatePicker::make('tanggal_pelaksanaan')
                            ->native(false)
                            ->required(),
                        TimePicker::make('jam_mulai')
                            // ->timezone('Indonesia/Jakarta')
                            ->required(),
                        TimePicker::make('jam_selesai')
                            ->required(),
                    ])->columns(2),

                Section::make('Mentor')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('mentor', 'name')
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->hiddenLabel()
                            ->required(),
                    ]),

                Section::make('Status Pelaksanaan')
                    ->schema([
                        Radio::make('status_pelaksanaan')
                            ->options([
                                'selesai' => 'Selesai',
                                'proses' => 'Proses',
                                'batal' => 'Batal',
                            ])
                            ->hiddenLabel()
                            ->hiddenOn('create')
                    ]),
            ]);
    }
}
