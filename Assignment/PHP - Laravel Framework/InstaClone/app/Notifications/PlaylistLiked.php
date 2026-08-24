<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PlaylistLiked extends Notification
{
    use Queueable;

    public $playlistName;
    public $likedBy;

    /**
     * Create a new notification instance.
     */
    public function __construct($playlistName, $likedBy)
    {
        $this->playlistName = $playlistName;
        $this->likedBy = $likedBy;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Someone liked your playlist!')
            ->greeting('Hey ' . $notifiable->name . '!')
            ->line($this->likedBy . ' liked your playlist "' . $this->playlistName . '".')
            ->line('Keep creating great playlists!')
            ->action('View Playlist', url('/playlists'))
            ->line('Thank you for using InstaClone!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'playlist_name' => $this->playlistName,
            'liked_by' => $this->likedBy,
        ];
    }
}