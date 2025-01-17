<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use App\Models\User;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Components\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Management User';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->required(),
                    ])->columns(2),

                Section::make('Foto Profile')
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
                            ->downloadable(),
                    ])->columns(1),

                Section::make('Data Diri')
                    ->schema([
                        TextInput::make('alamat'),
                        TextInput::make('no_hp')
                            ->label('Nomer Telefon')
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                    ])->columns(2),

                Section::make('Role')
                    ->schema([
                        Select::make('role')
                            ->options([
                                'admin' => 'Admin',
                                'mentor' => 'Mentor',
                                'pegawai' => 'Pegawai',
                                'umum' => 'Umum',
                            ])
                            ->native(false)
                            ->searchable()
                            ->required()
                            ->hiddenLabel(),
                    ]),

                Section::make('Password')
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->required()
                            ->hiddenLabel(),
                    ])->visibleOn('create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                ImageColumn::make('image_url')
                    ->label('Photo')
                    // ->width(100)
                    ->defaultImageUrl(url('images/default-profile.jpg'))
                    ->circular(true),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->translateLabel(),
                // Stack::make([
                TextColumn::make('email')
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500)
                    ->icon('heroicon-m-envelope')
                    ->toggleable(),
                TextColumn::make('no_hp')
                    ->label('Nomer Telepon')
                    ->copyable()
                    ->copyMessage('Nomer Telepon copied')
                    ->copyMessageDuration(1500)
                    ->icon('heroicon-m-phone')
                    ->toggleable(),
                // ]),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Waktu mendaftar')
                    ->toggleable(),
                IconColumn::make('email_verified_at')
                    ->label('Status Verifikasi')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->default(0)
                    ->toggleable(),
                TextColumn::make('role')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'mentor' => 'Mentor',
                        'pegawai' => 'Pegawai',
                    ]),
                TernaryFilter::make('email_verified_at')
                    ->label('Email verification')
                    ->nullable()
                    ->placeholder('All users')
                    ->trueLabel('Verified users')
                    ->falseLabel('Not verified users')
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])->tooltip('Actions')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User registered')
            ->body('The user has been created successfully.');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'no_hp', 'alamat', 'role'];
    }
}
