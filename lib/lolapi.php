<?php

class lolapi{
    private $summonerdataurl = "/v1.4/summoner/by-name/";
    private $championdataurl = "/v1.2/champion/";
    private $statsurl = "/v1.3/stats/by-summoner/";
    private $summarystatsurl = "/summary";
    private $rankedstatsurl = "/ranked";
    private $apikey = "?api_key=";
    
    public function getRegion($region){
        switch(strtolower($region)){
            case "na":
                return "na";
            case "euw":
                return "euw";
            case "eune":
                return "eune";
            case "br":
                return "br";
            case "kr":
                return "kr";
            case "lan":
                return "lan";
            case "las":
                return "las";
            case "oce":
                return "oce";
            case "ru":
                return "ru";
            case "tr":
                return "tr";
            default:
                return "???";
        }
    }
    
    public function buildBaseUrl($region){
        return "https://" . $region . ".api.pvp.net/api/lol/" . $region;
    }
    
    public function buildApiKeyUrl(){
        return $this->apikey . file_get_contents('../notes/key.txt');
    }
    
    public function buildAvatarUrl($region, $name){
        return "http://avatar.leagueoflegends.com/" . $region . "/" . $name .".png";
    }
    
    public function getSummonerDataUrl(){
        return $this->summonerdataurl;
    }
    
    public function getChampionDataUrl(){
        return $this->championdataurl;
    }
    
    public function getStatsUrl(){
        return $this->statsurl;
    }
    
    public function getSummaryStatsUrl(){
        return $this->summarystatsurl;
    }
    
    public function getRankedStatsUrl(){
        return $this->rankedstatsurl;
    }
    
    public function getSummoner($name){
        return str_replace(' ', '', strtolower($name));
    }
    
    public function getSummonerId($summonerArray, $name){
        return $summonerArray[$name]["id"];
    }
    
    public function getFormattedName($summonerArray, $name){
        return $summonerArray[lcfirst($name)]["name"];
    }

    public function getSummonerLevel($summonerArray, $name){
        return $summonerArray[lcfirst($name)]["summonerLevel"];
    }
    
    /*
     * Returns Summoner data json if name is valid.  Otherwise, an error code
     * corresponding to the HTTP response is returned.
     */
    public function getSummonerData($baseurl, $summonerdataurl, $summoner, $apikey){
        $jsonSumm = @file_get_contents($baseurl . $summonerdataurl . $summoner . 
                                       $apikey);  //summoner query
        $http_code = $this->error($http_response_header);
        if($http_code == NULL){
            return $jsonSumm;
        }
        else{
            return $http_code;
        }
        
    }
    
    public function getStatSummary($baseurl, $currentSummId, $apikey){
        return @file_get_contents($baseurl . $this->statsurl . $currentSummId 
                                           . $this->summarystatsurl . $apikey); 
    }
    
    public function jsonToArray($json){
        return json_decode($json, true);
    }
    
    public function possibleErrors(){
        return array(400, 401, 404, 429, 500, 503);
    }
    
    public function error($errorResponse){
        $error_str = explode(' ', $errorResponse[0]);
        $code = NULL;
        // $error_str[0] = "HTTP/1.1"
        // $error_str[1] = ERROR_CODE
        // $error_str[2..n-1] = ERROR_MSG words 

        switch($error_str[1]){
            case(400):
                $code = 400;
                break;
            case(401):
                $code = 401;
                break;
            case(404):
                $code = 404;
                break;
            case(429):
                $code = 429;
                break;
            case(500):
                $code = 500;
                break;
            case(503):
                $code = 503;
                break;
        }
        return $code;
    }
    
}