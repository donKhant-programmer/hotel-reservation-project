<p>Dear {{ $booking->name }},</p>

<p>Thank you for your booking!</p>

<p>
    <strong>Booking ID:</strong> {{ $booking->reference }}<br>
    <strong>Room:</strong> {{ $booking->room->room_number }}<br>
    <strong>Check-in:</strong> {{ $booking->check_in }}<br>
    <strong>Check-out:</strong> {{ $booking->check_out }}<br>
</p>

<p>We look forward to hosting you!</p>

<p>Regards,<br>Your Hotel Team</p>
