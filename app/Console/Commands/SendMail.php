<?php

namespace App\Console\Commands;

use App\Mail\PostMail;
use App\Models\Post;
use App\Models\Subscribe;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail sending Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::latest()->first();
        $subscribers = Subscribe::where('website_id', $post->website_id)->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new PostMail($post));
        }
    }
}
