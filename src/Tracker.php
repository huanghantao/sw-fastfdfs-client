<?php

namespace Codinghuang\SwFastDFSClient;

use Codinghuang\SwFastDFSClient\Protocol;

class Tracker extends Base
{
    public function queryStorageStorWithGroup($groupName)
    {
        $reqHeader = self::buildHeader(
                Protocol::TRACKER_PROTO_CMD_SERVICE_QUERY_STORE_WITH_GROUP_ONE, 
                Protocol::GROUP_NAME_MAX_LEN
        );
        $reqBody = self::padding($groupName, Protocol::GROUP_NAME_MAX_LEN);
        return $this->send($reqHeader . $reqBody);
    }
}