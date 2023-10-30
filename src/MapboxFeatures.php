<?php

namespace PushLogic\MapBoxAPILaravel;

use GuzzleHttp\Client as Guzzle;
use \PushLogic\MapBoxAPILaravel\Mapbox;
use \PushLogic\MapBoxAPILaravel\Facades\Mapbox as MapboxFacade;
use GeoJson\Feature\Feature;

/**
* Mapbox feature class
*/
class MapboxFeatures
{
    const TYPE = 'features';

    private $datasetID;
    private $featureID;
    private $guzzle;

    public function __construct($datasetID, $featureID = null)
    {
        $this->datasetID = $datasetID;
        $this->featureID = $featureID;
        $this->guzzle = new Guzzle();
    }

    private function request($options = [])
    {
        return MapboxFacade::getUrl(Mapbox::DATASET, $this->datasetID, $options);
    }

    public function list()
    {
        $response = $this->guzzle->get($this->request([
            MapboxFeatures::TYPE
        ]));

        return json_decode($response->getBody(), true);
    }

    public function add(Feature $feature)
    {
        if ($this->featureID == null)
        {
            throw new RunTimeException('Feature ID Required');
        }

        $response = $this->guzzle->put($this->request([
            MapboxFeatures::TYPE,
            $this->featureID
        ]), ['json' => $feature]);

        return json_decode($response->getBody(), true);
    }

    public function get()
    {
        if ($this->featureID == null)
        {
            throw new RunTimeException('Feature ID Required');
        }

        $response = $this->guzzle->get($this->request([
            MapboxFeatures::TYPE,
            $this->featureID
        ]));

        return json_decode($response->getBody(), true);
    }

    public function delete()
    {
        if ($this->featureID == null)
        {
            throw new RunTimeException('Feature ID Required');
        }

        $response = $this->guzzle->delete($this->request([
            MapboxFeatures::TYPE,
            $this->featureID
        ]));

        return $response->getStatusCode() === 204; // Assuming you want a boolean true/false for successful delete.
    }
}
