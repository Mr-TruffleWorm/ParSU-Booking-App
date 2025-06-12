<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $existingBooking = \App\Models\Booking::where('date', $data['date'])
            ->where('time', $data['time'])
            ->where('id', '!=', $this->record->id) // Exclude current record
            ->first();

        if ($existingBooking) {
            Notification::make()
                ->title('Time Slot Unavailable')
                ->body('This time slot is already booked.')
                ->warning()
                ->send();

            // Prevent form submission
            $this->halt();

            // Return empty data to prevent saving
            return [];
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
