<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Booking;
use Carbon\Carbon;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        try {
            // Parse date with more flexible parsing
            $selectedDate = Carbon::parse($data['date'])->startOfDay();
            $currentDate = Carbon::now()->startOfDay();

            // Parse time more carefully
            $selectedTime = Carbon::createFromTimeString($data['time']);

            // Validate if the selected date is at least 2 days from now and not in the past
            if ($selectedDate->lt($currentDate) || $selectedDate->diffInDays($currentDate) < 2) {
                Notification::make()
                    ->title('Invalid Date')
                    ->body('You can only book appointments starting from 2 days from today and not in the past.')
                    ->warning()
                    ->send();

                $this->halt(); // Prevent form submission
                return [];
            }

            // Validate time for the current date
            if ($selectedDate->isToday()) {
                $currentMoment = Carbon::now();
                $combinedDateTime = Carbon::today()->setTimeFrom($selectedTime);
                
                if ($combinedDateTime->isPast()) {
                    Notification::make()
                        ->title('Invalid Time')
                        ->body('You cannot book appointments for past times.')
                        ->warning()
                        ->send();

                    $this->halt(); // Prevent form submission
                    return [];
                }
            }

            // Validate if the user has already reached the weekly booking limit (3 bookings per week)
            $userStdntID = $data['stdnt_id'];
            $startOfWeek = $currentDate->startOfWeek();
            $endOfWeek = $currentDate->endOfWeek();

            $bookingCount = Booking::where('stdnt_id', $userStdntID)
                ->whereBetween('date', [$startOfWeek, $endOfWeek])
                ->count();

            if ($bookingCount >= 3) {
                Notification::make()
                    ->title('Maximum Bookings Reached')
                    ->body('You have reached the maximum number of bookings allowed for this week.')
                    ->warning()
                    ->send();

                $this->halt(); // Prevent form submission
                return [];
            }

            // Validate if the appointment slot is already booked
            $existingBooking = Booking::where('date', $data['date'])
                ->where('time', $data['time'])
                ->first();

            if ($existingBooking) {
                Notification::make()
                    ->title('Time Slot Unavailable')
                    ->body('This time slot is already booked.')
                    ->warning()
                    ->send();

                $this->halt(); // Prevent form submission
                return [];
            }

            // If all checks pass, return the original data to proceed with saving
            return $data;

        } catch (\Exception $e) {
            Notification::make()
                ->title('Invalid Input')
                ->body('There was an error processing your booking. Please check your date and time.')
                ->warning()
                ->send();

            $this->halt(); // Prevent form submission
            return [];
        }
    }
}