<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // For every post create one or more notifications referencing
        // - post title
        // - truncated post body (30 chars + ...)
        // - random is_read boolean
        // - user_id of the post's owner

        $posts = Post::all();

        foreach ($posts as $post) {

            Notification::factory()->create(
                [
                    'title' => $post->title,
                    'message' => Str::limit($post->body, 30, '...'),
                    'is_read' => (bool) random_int(0, 1),
                    'user_id' => $post->user_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
