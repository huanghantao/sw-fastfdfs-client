<?php

namespace Codinghuang\SwFastDFSClient;

class Buffer
{
    private $buffer;
    private $size;
    private $position;

    public function __construct()
    {
        $this->position = 0;
        $this->size = 0;
    }

    public function writeToBuffer($buffer, $size)
    {
        $this->buffer = $buffer;
        $this->size = $size;
        $this->position = 0;
    }

    public function readFromBuffer($len)
    {
        if ($this->position + $len > $this->size) {
            return false;
        }
        $res = substr($this->buffer, $this->position, $len);
        $this->position += $len;
        return $res;
    }

    public function unpackFromBuffer($format, $len)
    {
        if ($this->position + $len > $this->size) {
            return false;
        }
        $res = unpack($format, substr($this->buffer, $this->position, $len));
        $this->position += $len;
        return $res;
    }
}