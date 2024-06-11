<?php

namespace App\Filament\Resources\MapPoolResource\RelationManagers;

use Closure;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class MapsRelationManager extends RelationManager
{
    protected static string $relationship = 'maps';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('map_id')
                    ->required()
                    ->maxLength(255)
                    ->numeric()
                    ->suffixAction(fn (?string $state, Forms\Set $set) =>
                        Action::make('search-action')
                            ->icon('heroicon-m-magnifying-glass')
                            ->action(function () use ($state, $set) {
                                if (blank($state))
                                    return;
                                try {
                                    $beatMapData = Http::baseUrl('https://osu.ppy.sh/api')
                                        ->get('/get_beatmaps', [
                                            'k' => '8b1ac9114ccb0acddabebcdc9782274d763a4e25',
                                            'b' => $state,
                                        ])
                                        ->throw()
                                        ->json(0);
                                    if (($beatMapData) == null)
                                        Notification::make()
                                            ->title('Beatmap not found')
                                            ->danger()
                                            ->send();
                                    else
                                        Notification::make()
                                            ->title('Beatmap found')
                                            ->success()
                                            ->send();
                                } catch (RequestException $e) {
                                    Notification::make()
                                        ->title('Beatmap not found')
                                        ->danger()
                                        ->send();
                                }
                                $set('name', $beatMapData['title'] ?? null);
                                $set('star_rating', round($beatMapData['difficultyrating'] ?? null, 2) ?? null);
                                $set('bpm', $beatMapData['bpm'] ?? null);
                                $set('length', $beatMapData['total_length'] ?? null);
                                $set('beatmapset_id', $beatMapData['beatmapset_id'] ?? null);
                                $set('difficulty_name', $beatMapData['version'] ?? null);
                                $set('artist', $beatMapData['artist'] ?? null);
                                $set('creator', $beatMapData['creator'] ?? null);
                            })),

                Forms\Components\Section::make('Map Information')
                    ->columns(4)
                    ->schema([
                        TextInput::make('artist')->readOnly(),
                        TextInput::make('name')->columnSpan(2)->required()->readOnly(),
                        TextInput::make('star_rating')->readOnly(),
                        TextInput::make('difficulty_name')->readOnly()->label('Difficulty Name')->columnSpan(2),
                        TextInput::make('bpm')->readOnly()->label('BPM'),
                        TextInput::make('length')->readOnly(),
                        TextInput::make('beatmapset_id')->readOnly()->label('Beatmapset ID'),
                        TextInput::make('creator')->readOnly(),

                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('map_id')
            ->columns([
                ImageColumn::make('avatar')
                    ->defaultImageUrl(fn ($record) => "https://assets.ppy.sh/beatmaps/{$record->beatmapset_id}/covers/cover.jpg")
                    ->height(1080 / 1920 * 150)
                    ->width(1920 / 1080 * 150),
                Tables\Columns\TextColumn::make('artist'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('difficulty_name')->label('Difficulty Name'),
                Tables\Columns\TextColumn::make('star_rating')->suffix('★'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
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
}
