<?php

namespace app\components\JsonServerService;

use yii\base\Component;
use GuzzleHttp\Client;

class Init extends Component
{
    public $apiUriBase;

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

    public function cityByName($cityName)
    {
        $params = [
            'name_like' => $cityName,
            '_limit'=>10
        ];

        $response = $this->_client->get("{$this->apiUriBase}/city",
            ['query' => $params]
        );

        return  $this->formatResult($response->getBody()->getContents());
    }

    private function formatResult($data) {
        if (!empty($data)) {
            return json_decode($data);
        }
        return null;
    }
}
