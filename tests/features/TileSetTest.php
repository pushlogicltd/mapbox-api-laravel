<?php

namespace PushLogicLtd\MapBoxAPILaravel\Tests;

use PushLogicLtd\MapBoxAPILaravel\Tests\TestCase;
use PushLogicLtd\MapBoxAPILaravel\Models\Dataset;
use Mapbox;

/**
* Test working with a tileset
*/
class TileSetTest extends TestCase
{
    public function testListTileSet()
    {
        $response = Mapbox::tilesets()->list();

        $this->assertEquals(is_array($response), true);
    }
}
