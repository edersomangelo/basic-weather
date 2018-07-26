<?php

namespace app\components\WeatherService;

use GuzzleHttp\Client;
use yii\base\Component;
use yii\data\ArrayDataProvider;

class Init extends Component
{
    public $apiUriBase;
    public $appId;

    private $_client;
    private $_defaultParams;

    /**
     * Init constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->_client = new Client();
        $this->_defaultParams = [
            'units'=>'metric',
            'appid' => $config['appId']
        ];
        parent::__construct($config);
    }

    /**
     * @param int $cityId
     * @return null|string
     */
    public function weatherByCityId(int $cityId)
    {
        $params = array_merge($this->_defaultParams,[
            'id' => $cityId
        ]);

        $response = $this->_client->get("{$this->apiUriBase}/weather" ,
            ['query' => $params]
        );

        return  $this->formatResult($response->getBody()->getContents());
    }

    public function forecastByCityId(int $cityId)
    {
        $params = array_merge($this->_defaultParams,[
            'id' => $cityId
        ]);

        $response = $this->_client->get("{$this->apiUriBase}/forecast" ,
            ['query' => $params]
        );

        return  $this->formatResult($response->getBody()->getContents());
    }

    public function searchCity($term){
        $provider = new ArrayDataProvider([
            'key'=>'id',
            'allModels' => [
                
            ],
        ]);
    }

    private function formatResult($data) {
        if (!empty($data)) {
            return json_decode($data);
        }
        return null;
    }
}
