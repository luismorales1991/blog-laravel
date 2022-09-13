<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        if ($post->image && !filter_var($post->image->url,FILTER_VALIDATE_URL)) {
            Storage::delete($post->image->url);
        }
    }
}
