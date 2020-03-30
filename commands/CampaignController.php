<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

use yii\httpclient\Client;
use yii\helpers\BaseJson;

use app\models\DataForCampaign;
use app\models\Worker;

class CampaignController extends Controller
{

    const AUTH = "https://platform.mobivisits.com/login";
    const ADD = "https://platform.mobivisits.com/campaigns";

    const LOGIN = "stanis.los@yandex.ru";
    const PASS = "T~ifC6hm";

    private $client;
    private $data;
    private $cookies;

    public function actionCreate(String $name = 'hello world', String $url = 'https://yandex.ru')
    {
        $this->client = new Client();
        $this->data = new DataForCampaign($name, $url);
        $this->sendPostAuth();
        $this->sendCampaign();
        return ExitCode::OK;
    }

    private function sendPostAuth()
    {
        $authResponse = $this->client->post(self::AUTH, [
            "email" => self::LOGIN,
            "password" => self::PASS
        ])->send();
        $this->checkResponse($authResponse, true);
    }

    private function sendCampaign()
    {
        $campaignResponse = $this->client->createRequest()
            ->setFormat(Client::FORMAT_JSON)
            ->setCookies($this->cookies)
            ->setMethod("POST")
            ->setUrl(self::ADD)
            ->setData($this->data->__toArray())
            ->send();           
        $this->checkResponse($campaignResponse);
    }

    private function checkResponse(\yii\httpclient\Response $response, Bool $auth = false)
    {
        $jsonContent = BaseJson::decode($response->getContent());
        $this->stdout($jsonContent["message"]."\n");
        $this->errPrint($jsonContent["errors"]);
        if ( $response->getIsOk() && $jsonContent["status"] == "1" )
            $this->checkAuth($auth, $response);  
    }

    private function checkAuth(Bool $auth, $response)
    {
        if( $auth )
            $this->cookies = $response->getCookies();
        else
            $this->saveToDb();
    }

    private function errPrint(Array $errors)
    {
        foreach ($errors as $error)
                $this->stdout($error."\n");
    }

    private function saveToDb(){
        $worker = new Worker();
        $worker->name = $this->data->name;
        $worker->url = $this->data->clickUrl;
        $worker->save();
    }

}