<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Telescope::night();

        $this->hideSensitiveRequestDetails();

        $isLocal = $this->app->environment('local');

        Telescope::filter(function (IncomingEntry $entry) use ($isLocal) {
            return $isLocal ||
                $this->isException($entry) ||
                $this->isFailedRequest($entry) ||
                $entry->isFailedJob() ||
                $entry->isSlowQuery() ||
                $entry->isScheduledTask() ||
                $entry->isSlowQuery() ||
                $entry->isLog() ||
                $entry->hasMonitoredTag();
        });
    }

    private function isFailedRequest(IncomingEntry $entry): bool
    {
        return $entry->type === EntryType::REQUEST &&
            ($entry->content['response_status'] ?? 200) >= 400;
    }

    private function isException(IncomingEntry $entry): bool
    {
        return $entry->type === EntryType::EXCEPTION;
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     */
    protected function hideSensitiveRequestDetails(): void
    {
        if ($this->app->environment('local', 'uat')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewTelescope', function ($user) {
            return $user->isSuperAdmin();
        });
    }
}
