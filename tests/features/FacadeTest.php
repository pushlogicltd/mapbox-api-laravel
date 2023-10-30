<?php

namespace PushLogicLtd\MapBoxAPILaravel\Tests;

use PushLogicLtd\MapBoxAPILaravel\Tests\TestCase;
use Mapbox as MapboxFacade;
use PushLogicLtd\MapBoxAPILaravel\Mapbox;

/**
* Test submitting a dataset
*/
class FacadeTest extends TestCase
{
    public function testFacadeExists()
    {
        $this->assertInstanceOf(Mapbox::class, MapboxFacade::test());
    }
}
