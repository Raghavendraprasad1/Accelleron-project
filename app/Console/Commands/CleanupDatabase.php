<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class CleanupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all posts without comments';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Delete posts without comments
        $deleted = Post::doesntHave('comments')->delete();

        $this->info("Deleted {$deleted} posts without comments.");
    }
}
