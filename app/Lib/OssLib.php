<?php
/**
 * User: namet117<namet117@163.com>
 * DateTime: 2018/9/11 22:46
 */

namespace App\Lib;


use League\Flysystem\AdapterInterface;
use League\Flysystem\Config;
use OSS\OssClient;

class OssLib implements AdapterInterface
{
    private $_config;

    /**
     * OSS 客户端
     * @var \OSS\OssClient
     */
    private $_client;

    private $_bucket;

    public function __construct($config)
    {
        $this->_config = $config;
        $config = config('oss.oss');
        $this->_bucket = $config['bucket'];
        $this->_client = new OssClient($config['appid'], $config['secret'], $config['endpoint']);
    }

    public function copy($path, $newpath)
    {
        // TODO: Implement copy() method.
    }

    public function createDir($dirname, Config $config)
    {
        // TODO: Implement createDir() method.
    }

    public function delete($path)
    {
        // TODO: Implement delete() method.
    }

    public function deleteDir($dirname)
    {
        // TODO: Implement deleteDir() method.
    }

    public function getMetadata($path)
    {
        // TODO: Implement getMetadata() method.
    }

    public function getMimetype($path)
    {
        // TODO: Implement getMimetype() method.
    }

    public function getSize($path)
    {
        // TODO: Implement getSize() method.
    }

    public function getTimestamp($path)
    {
        // TODO: Implement getTimestamp() method.
    }
    public function getVisibility($path)
    {
        // TODO: Implement getVisibility() method.
    }

    public function has($path)
    {
        // TODO: Implement has() method.
    }

    public function listContents($directory = '', $recursive = false)
    {
        // TODO: Implement listContents() method.
    }

    public function read($path)
    {
        // TODO: Implement read() method.
    }

    public function readStream($path)
    {
        // TODO: Implement readStream() method.
    }

    public function rename($path, $newpath)
    {
        // TODO: Implement rename() method.
    }

    public function setVisibility($path, $visibility)
    {
        // TODO: Implement setVisibility() method.
    }

    public function update($path, $contents, Config $config)
    {
        // TODO: Implement update() method.
    }

    public function updateStream($path, $resource, Config $config)
    {
        // TODO: Implement updateStream() method.
    }

    public function write($path, $contents, Config $config)
    {
        dd($path, $contents, $config);
        exit;
    }

    public function writeStream($path, $resource, Config $config)
    {
        $this->_client->putObject($this->_bucket, $path, stream_get_contents($resource));

        return true;
    }

    public function getUrl($path)
    {
        return is_url($path)? $path :(env('IMG_URL') . "/{$path}");
    }
}
