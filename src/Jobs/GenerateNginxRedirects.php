<?php

namespace Glorax\FilamentRedirect\Jobs;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Queue\Queueable;
use Glorax\FilamentRedirect\Enums\CodeEnum;
use Illuminate\Contracts\Queue\ShouldQueue;
use Glorax\FilamentRedirect\Models\Redirect;

class GenerateNginxRedirects implements ShouldQueue
{
    use Queueable;

    public int $tries = 5;

    public int $backoff = 30;

    private string $disk;

    /**
     * Create a new job instance.
     */
    public function __construct(private Redirect $record) {
        $this->disk = config('filament-redirect.default_storage_disk');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $nginxDirective = CodeEnum::tryFrom($this->record->code)->getTitle();
        $redirect = "{$this->record->from_url} {$this->record->to_url} $nginxDirective";

        Storage::disk($this->disk)->prepend('redirects', $redirect);
    }
}
