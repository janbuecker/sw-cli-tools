<?php

namespace Shopware\PluginCreator\Services\IoAdapter;

/**
 * HardDrive IoAdapter actually performs IO on the hdd
 *
 * Class HardDrive
 * @package Shopware\PluginCreator\Services\IoAdapter
 */
class HardDrive implements IoAdapter
{
    /**
     * @param $path
     * @return bool
     */
    public function exists($path)
    {
        return file_exists($path);
    }

    public function createDirectory($path)
    {
        if ($this->exists($path)) {
            return;
        }

        $success = mkdir($path, 0777, true);

        if (!$success) {
            throw new \RuntimeException("Could not create »{$path}«. Check your directory permission");
        }
    }

    public function createFile($file, $content)
    {
        file_put_contents($file, $content);
    }
}
