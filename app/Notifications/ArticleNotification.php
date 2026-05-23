<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Container\Attributes\Database;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleNotification extends Notification implements  ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected Article $article;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }
public function toDatabase(){
   return[
     'article_id' => $this->article->id,
      'title' => $this->article->title,
      'user_id' => $this->article->user_id,
       'message' =>'New Article Created by: '.$this->article->title,
        'url' => url('/articles/'.$this->article->id),
         
   ];
}
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject("New Article")
            ->line('New article Create.')
            ->action('Notification Action', url('/articles/'.$this->article->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
