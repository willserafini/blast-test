<?php

namespace App\Listeners;

use App\Events\NewNumberEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\NumberPreference;

class CreateDefaultPreferences
{
    /**
     * Handle the event.
     *
     * @param  NewNumberEvent  $event
     * @return void
     */
    public function handle(NewNumberEvent $event)
    {
        foreach (NumberPreference::getDefaultsPreferences() as $preferenceName => $preferenceValue) {
            $pref = NumberPreference::create([
                'number_id' => $event->number->id,
                'name'      => $preferenceName,
                'value'     => $preferenceValue
            ]);
        }
    }
}
