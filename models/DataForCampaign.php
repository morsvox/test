<?php

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;

class DataForCampaign
{
        public $name = "qweqwe";
        public $cloneUpdated = null;
        public $inventorySource = "RTB";
        public $frequencyCap = 0;
        public $frequencyCapPerPub = 0;
        public $creativeJsTag = "";
        public $bannerType = "IMAGE";
        public $appSites = [];
        public $conversionType = "CPM";
        public $iabCategoryCodes = [];
        public $endDate = "03/30/2021";
        public $budgetLimitDaily = 200;
        public $budgetLimitHourly = 0.01;
        public $budgetTotal = 99999;
        public $bid = 1;
        public $cpmBid = 1;
        public $isScheduled = 0;
        public $schedules = [];
        public $targetingOs = ["ANDROID", "APPLE"];
        public $targetingCarrierWifi = "ALL";
        public $countriesAlpha2 = ["US"];
        public $countryRelatedTargeting = [
            "country_code2" => "US",
            "states_codes" => [],
            "carriers" => [],
            "cities" => []
        ];
        public $states = [];
        public $cities = [];
        public $carriers = [];
        public $carriers2 = [];
        public $isps = [];
        public $adDomain = "https://yandex.ru";
        public $clickUrl = "https://yandex.ru";
        public $banners = [];
        public $scriptResolution = "320x50";
        public $scriptCreative = "";
        public $bannerTitle = "";
        public $bannerDesc = "";
        public $bannerIconUrl = "http://tag22.mobivisits.com/icons/nicon-bb.jpg";
        public $ipListType = "NONE";
        public $appListType = "NONE";
        public $deviceListType = "NONE";
        public $publisherListType = "NONE";
        public $gpsListType = "NONE";
        public $domainListType = "NONE";
        public $bundleListType = "NONE";
        public $bwlist = [];
        public $maxImpressions = 0;
        public $maxClicks = 0;
        public $maxConversion = 0;
        public $trafficType = "BOTH";
        public $deviceType = "BOTH";
        public $phoneType = "BOTH";
        public $osVersions = [];
        public $hasAndroidVersions = false;
        public $hasIosVersions = false;
        public $manufacturers = [];
        public $gender = "ALL";
        public $ageFrom = 18;
        public $ageTo = 60;
        public $deliveryPacing = "ASAP";
        public $clicksCapping = 0;
        public $latitude = "";
        public $longitude = "";
        public $geoRadius = "";
        public $placementOptimizer = [
            "id" => "",
            "rate" => ""
        ];
        public $adSpaceBids = [
            "id" => "",
            "bid" => 0
        ];
        public $hours = [];
        public $publisherListId = null;
        public $appListId = null;
        public $ipListId = null;
        public $bundleListId = null;
        public $bannerSubTypes = ["BANNER", "NATIVE", "POP", "PUSH", "INCENT", "SEARCH", "EMAIL", "ADULT", "WEBSITES", "DOORWAYS", "MOBILE", "CONTEXT", "BRAND_CONTEXT", "TEASER", "CLICK_UNDER", "POP_UNDER", "REBROKERING", "SOCIAL_TARGETED"];

        public function __construct($name, $url){
            $this->name = $name;
            $this->clickUrl = $url;
            $this->adDomain = $url;
        }

        public function __toArray(){
            return ArrayHelper::toArray($this);
        }
}