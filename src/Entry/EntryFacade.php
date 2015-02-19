<?php namespace Blackbirddev\Entry;

use Illuminate\Support\Facades\Facade;

class EntryFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'entry';
    }

}