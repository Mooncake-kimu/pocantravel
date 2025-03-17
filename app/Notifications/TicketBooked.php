<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketBooked extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Your ticket has been booked successfully.')
            ->line('Bus Number: ' . $this->ticket->bus->bus_number)
            ->line('Route: ' . $this->ticket->bus->route)
            ->line('Departure Time: ' . $this->ticket->departure_time->format('Y-m-d H:i:s')) // Format waktu
            ->action('View Ticket', url('/tickets/history'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'ticket_id' => $this->ticket->id,
            'bus_number' => $this->ticket->bus->bus_number,
            'route' => $this->ticket->bus->route,
            'departure_time' => $this->ticket->departure_time,
        ];
    }
}