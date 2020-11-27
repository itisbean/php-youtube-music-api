<?php

namespace youtubeMusic;

use GuzzleHttp\Client;

class Api
{

    protected $_client;

    public function __construct()
    {
        $this->_client = new Client();
    }


    /**
     * 搜索
     * @param string $keyword
     * @return array
     */
    public function search($keyword)
    {
        
    }


    /**
     * 获取歌手信息
     * @param integer $singerId 歌手ID
     * @return array
     */
    public function getSingerInfo()
    {
        $url = "https://music.youtube.com/youtubei/v1/browse";
        $param = [
            'alt' => 'json',
            'key' => 'AIzaSyC9XL3ZjWddXya6X74dJoCTL-WEYFDNX30',
        ];
        $url .= '?' . http_build_query($param);
        $json = '{
            "context": {
                "client": {
                    "clientName": "WEB_REMIX",
                    "clientVersion": "0.1",
                    "hl": "zh-CN",
                    "gl": "HK",
                    "experimentIds": [],
                    "experimentsToken": "",
                    "browserName": "Chrome",
                    "browserVersion": "75.0.3770.142",
                    "osName": "Windows",
                    "osVersion": "10.0",
                    "utcOffsetMinutes": 480,
                    "locationInfo": {
                        "locationPermissionAuthorizationStatus": "LOCATION_PERMISSION_AUTHORIZATION_STATUS_UNSUPPORTED"
                    },
                    "musicAppInfo": {
                        "musicActivityMasterSwitch": "MUSIC_ACTIVITY_MASTER_SWITCH_INDETERMINATE",
                        "musicLocationMasterSwitch": "MUSIC_LOCATION_MASTER_SWITCH_INDETERMINATE",
                        "pwaInstallabilityStatus": "PWA_INSTALLABILITY_STATUS_CAN_BE_INSTALLED"
                    }
                },
                "capabilities": {},
                "request": {
                    "internalExperimentFlags": [],
                    "sessionIndex": {}
                },
                "clickTracking": {
                    "clickTrackingParams": "CLIGEMn0AhgAIhMI287nmr-i7QIVKNZMAh2D8w5O"
                },
                "activePlayers": {},
                "user": {
                    "enableSafetyMode": false
                }
            },
            "browseId": "UCuuUXO877z7K1_c37-vWsUg",
            "browseEndpointContextSupportedConfigs": {
                "browseEndpointContextMusicConfig": {
                    "pageType": "MUSIC_PAGE_TYPE_ARTIST"
                }
            }
        }';
        try {
            $response = $this->_client->post($url, [
                'json' => $json,
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return $this->_error('get singer info failed, [' . $e->getCode() . '] ' . $e->getMessage());
        }
        $result = $response->getBody()->getContents();
        $data = json_decode($result, true);
        echo json_encode($data, JSON_UNESCAPED_UNICODE)."\n";die;
        if ($data['errcode'] != 0) {
            return $this->_error($data['error']);
        }
        return $this->_success($data['data']);
    }


    /**
     * 获取歌手歌曲
     * @param integer $singerId
     * @param integer $page
     * @param integer $pageSize
     * @return array
     */
    public function getSingerSongs($singerId, $page = 1, $pageSize = 50)
    {
        
    }


    /**
     * 获取歌手专辑
     * @param integer $singerId 歌手ID
     * @return array
     */
    public function getSingerAlbums($singerId, $page = 1, $pageSize = 50)
    {
        
    }


    /**
     * 获取专辑收藏数
     * @param integer $singerId
     * @param integer $albumId
     * @return array
     */
    public function getListCollectionNum($singerId, $albumId)
    {
        
    }



    /**
     * 获取专辑信息
     * @param mixed $albumIds
     * @return array
     */
    public function getAlbumInfo($albumIds)
    {
        
    }


    /**
     * 获取专辑歌曲
     * @param string $albumId 专辑ID
     * @return array
     */
    public function getAlbumSongs($albumId)
    {
        
    }


    /**
     * 获取歌曲评论数
     * @param string $hash
     * @return array
     */
    public function getSongCommentNum($hash)
    {
        
    }


    /**
     * 获取歌曲榜单信息
     * @param mixed $songIds
     * @return array
     */
    public function getSongRankTop($songIds)
    {
        
    }


    /**
     * 获取榜单歌曲列表
     * @param integer $chartId
     * @return array
     */
    public function getChartSongs($rankId, $volid = '')
    {
        
    }


    /**
     * 获取往期榜单歌曲
     * @param integer $rankId
     * @return array
     */
    public function getHistoryChartSongs($rankId)
    {
        
    }


    /**
     * 获取歌手排行榜数据
     * @param string $singerName 歌手名
     * @param array $rankIds 排行榜ID，为空就用配置中默认的
     * @return array
     */
    public function getSingersRankInfo($singerName, $rankIds = [])
    { 
        
    }


    private function _success($data = [])
    {
        return ['ret' => true, 'data' => $data, 'msg' => ''];
    }

    private function _error($msg = '')
    {
        return ['ret' => false, 'data' => null, 'msg' => $msg];
    }
}
