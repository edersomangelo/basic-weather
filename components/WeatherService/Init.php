<?php

namespace app\components\WeatherService;

use GuzzleHttp\Client;
use yii\base\Component;

class Init extends Component
{
    public $apiUriBase;
    public $appId;

    private $_client;

    /**
     * Init constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->_client = new Client();
        parent::__construct($config);
    }

    /**
     * @param int $cityId
     * @return null|string
     */
    public function weatherByCityId(int $cityId)
    {
        $params = [
            'id' => $cityId,
            'appid' => $this->appId
        ];

        $response = $this->_client->get("{$this->apiUriBase}/weather" ,
            ['query' => $params]
        );

        $return = $response->getBody()->getContents();
        if (!empty($return)) {
            return $return;
        }

        return null;
    }
}
