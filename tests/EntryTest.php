<?php

use Blackbirddev\Entry\Entry;
use Mockery as m;

class EntryTest extends PHPUnit_Framework_TestCase
{

    protected $nullFilterTest;

    protected $abortFilterTest;

    protected $customResponseFilterTest;

    protected $expectedResponse;

    public function setUp()
    {
        $this->nullFilterTest = function ($filterClosure) {
            if (!($filterClosure instanceof Closure)) {
                return false;
            }

            $this->assertNull($filterClosure());

            return true;
        };

        $this->abortFilterTest = function ($filterClosure) {
            if (!($filterClosure instanceof Closure)) {
                return false;
            }

            try {
                $filterClosure();
            } catch (Exception $e) {
                $this->assertSame('abort', $e->getMessage());

                return true;
            }

            return false;
        };

        $this->customResponseFilterTest = function ($filterClosure) {
            if (!($filterClosure instanceof Closure)) {
                return false;
            }

            $result = $filterClosure();

            $this->assertSame($this->expectedResponse, $result);
        };
    }

    public function tearDown()
    {
        m::close();
    }

    public function testHasRole()
    {
        $app = new stdClass();
        $entry = m::mock('Blackbirddev\Entry\Entry[user]', [$app]);
        $user = m::mock('_mockedUser');

        $entry->shouldReceive('user')->andReturn($user)->twice()->ordered();
        $entry->shouldReceive('user')->andReturn(false)->once()->ordered();

        $user->shouldReceive('hasRole')->with('UserRole', false)->andReturn(true)->once();
        $user->shouldReceive('hasRole')->with('NonUserRole', false)->andReturn(false)->once();

        $this->assertTrue($entry->hasRole('UserRole'));
        $this->assertFalse($entry->hasRole('NonUserRole'));
        $this->assertFalse($entry->hasRole('AnyRole'));
    }

    public function testUser()
    {
        $app = new stdClass();
        $app->auth = m::mock('Auth');

        $entry = new Entry($app);
        $user = m::mock('_mockedUser');

        $app->auth->shouldReceive('user')->andReturn($user)->once();

        $this->assertSame($user, $entry->user);
    }

}