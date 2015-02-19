<?php
/**
 * Created by PhpStorm.
 * User: bobby
 * Date: 18/02/15
 * Time: 21:10
 */

namespace Blackbirddev\Entry;


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