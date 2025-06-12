<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Booking;
use Carbon\Carbon;

class MaxBookingsPerWeek implements Rule
{
    public function passes($attribute, $value)
    {
        $userStdntID = request()->input('stdnt_id');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        $bookingCount = Booking::where('stdnt_id', $userStdntID)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->count();

        return $bookingCount < 3;
    }

    public function message()
    {
        return 'You have reached the maximum number of bookings allowed per week.';
    }
}