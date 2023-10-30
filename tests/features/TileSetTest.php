<?php

namespace PushLogic\MapBoxAPILaravel\Tests;

use PushLogic\MapBoxAPILaravel\Tests\TestCase;
use PushLogic\MapBoxAPILaravel\Models\Dataset;
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
