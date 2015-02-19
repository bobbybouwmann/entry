<?php namespace Blackbirddev\Entry;

class Entry
{

    /**
     * Laravel app instance
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

}