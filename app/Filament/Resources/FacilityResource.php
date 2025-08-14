<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacilityResource\Pages;
use App\Filament\Resources\FacilityResource\RelationManagers;
use App\Models\Facility;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use App\Models\Flight;
use App\Models\Seat;
use Illuminate\Http\Request;


class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('facilities')
                    ->disk('public')
                    ->required()
                    ->columnSpan(2),

                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFacilities::route('/'),
            'create' => Pages\CreateFacility::route('/create'),
            'edit' => Pages\EditFacility::route('/{record}/edit'),
        ];
    }

    public function showChooseSeat($flightId)
    {
        $flight = Flight::findOrFail($flightId);
        $seats = Seat::where('flight_id', $flightId)->get();
        return view('choose-seat', compact('flight', 'seats'));
    }

    public function storeChooseSeat(Request $request, $flightId)
    {
        // Validasi dan simpan kursi yang dipilih user
    }

    public function chooseSeat($flightId, Request $request)
    {
        $class = $request->get('class', 'economy'); // default economy
        $flight = Flight::findOrFail($flightId);
        $seats = Seat::where('flight_id', $flightId)
            ->where('class', $class)
            ->get();
        return view('choose-seat', compact('flight', 'seats', 'class'));
    }
}
