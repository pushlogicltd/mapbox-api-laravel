<?php

namespace PushLogicLtd\MapBoxAPILaravel\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

/**
* Test submitting a dataset
*/
class TestCase extends OrchestraTestCase
{
    protected $testDataset;
    protected $testUsername;

    protected function getPackageProviders($app)
    {
        return ['PushLogicLtd\MapBoxAPILaravel\MapBoxAPILaravelServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Mapbox' => 'PushLogicLtd\MapBoxAPILaravel\Facades\Mapbox'
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        if (file_exists(dirname(__DIR__) . '/.env.test')) {
            (new \Dotenv\Dotenv(dirname(__DIR__), '.env.test'))->load();
        }

        $app['config']->set('mapbox', [
            'api_url'         => 'api.mapbox.com',
            'api_version'     => 'v1',
            'use_ssl'         => true,
            'username'        => getenv('MAPBOX_USERNAME'),
            'access_token'    => getenv('MAPBOX_ACCESS_TOKEN')
        ]);

        $this->testUsername = getenv('MAPBOX_USERNAME');
        $this->testDataset = getenv('MAPBOX_TEST_DATASET_ID');
    }
}
