<?php

namespace App\Observers;

use App\Models\State;
use Illuminate\Support\Facades\Log;

class StateObserver
{
    /**
     * Handle the State "created" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function created(State $state)
    {
        Log::info("New state".$state."Data Inserted by ".auth()->user()->username);
    }

    /**
     * Handle the State "updated" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function updated(State $state)
    {
        Log::info("State".$state."Data Updated by ".auth()->user()->username);
    }

    /**
     * Handle the State "deleted" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function deleted(State $state)
    {
        Log::info("State".$state."Data Deleted by ".auth()->user()->username);
    }

    /**
     * Handle the State "restored" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function restored(State $state)
    {
        //
    }

    /**
     * Handle the State "force deleted" event.
     *
     * @param  \App\Models\State  $state
     * @return void
     */
    public function forceDeleted(State $state)
    {
        //
    }
}
