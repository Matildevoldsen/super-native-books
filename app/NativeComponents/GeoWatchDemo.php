<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Facades\Geolocation;

/**
 * Geolocation POC — STREAM continuous location updates (watchPosition).
 *
 * Start begins a native watch; every GPS fix arrives as a LocationUpdated
 * event routed to the persistent ->locationUpdated() handler and re-renders.
 * The watch auto-stops on unmount (walk away from the screen = GPS off);
 * Stop exercises Geolocation::clearWatch() manually.
 */
class GeoWatchDemo extends NativeComponent
{
    public string $watchId = '';

    public bool $watching = false;

    public int $updates = 0;

    public ?float $latitude = null;

    public ?float $longitude = null;

    public ?float $accuracy = null;

    public ?float $speed = null;

    public ?float $heading = null;

    public ?string $error = null;

    public function navTitle(): string
    {
        return 'Geo — Watch Position';
    }

    public function startSteaming()
    {
        $this->error = null;

        // Ask first; start streaming only once permission is settled.
        Geolocation::requestPermissions()
            ->permissionRequestResult(function ($event) {
                if (($event->location ?? 'denied') !== 'granted') {
                    $this->error = 'Location permission '.($event->location ?? 'denied');

                    return;
                }

                $this->watchId = Geolocation::watchPosition(fineAccuracy: true)
                    ->interval(2000)
                    ->minDistance(1)
                    ->locationUpdated(function ($event) {
                        if (! $event->success) {
                            $this->error = $event->error;

                            return;
                        }

                        $this->updates++;
                        $this->latitude = $event->latitude;
                        $this->longitude = $event->longitude;
                        $this->accuracy = $event->accuracy;
                        $this->speed = $event->speed ?? null;
                        $this->heading = $event->heading ?? null;
                    })
                    ->getId();

                $this->watching = true;
            });
    }

    public function stopStreaming()
    {
        if ($this->watchId !== '') {
            Geolocation::clearWatch($this->watchId);
        }

        $this->watching = false;
    }

    public function render(): View
    {
        return view('native.geo-watch-demo');
    }
}
