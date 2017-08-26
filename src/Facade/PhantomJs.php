<?php

namespace MSClics\PhantomJs\Facade;

use Illuminate\Support\Facades\Facade;

class PhantomJs extends Facade {

    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return 'pjclient';
    }
}