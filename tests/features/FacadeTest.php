<?php

namespace PushLogic\MapBoxAPILaravel\Tests;

use PushLogic\MapBoxAPILaravel\Tests\TestCase;
use Mapbox as MapboxFacade;
use PushLogic\MapBoxAPILaravel\Mapbox;

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
