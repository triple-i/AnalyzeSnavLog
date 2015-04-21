<?php


namespace Asl\Reader\Parser;

abstract class AbstractParser
{

    /**
     * @var array
     **/
    private $file;


    /**
     * @param  array $file
     * @return void
     **/
    public function setFile ($file)
    {
        $this->file = $file;
    }


    /**
     * @return string
     **/
    public function getFileName ()
    {
        if (is_null($this->file['name'])) throw new \Exception('ファイル情報が指定されていません');
        return $this->file['name'];
    }


    /**
     * @return string
     **/
    public function getFilePath ()
    {
        if (is_null($this->file['tmp_name'])) throw new \Exception('ファイル情報が指定されていません');
        return $this->file['tmp_name'];
    }


    /**
     * @return string
     **/
    public function getFileType ()
    {
        if (is_null($this->file['type'])) throw new \Exception('ファイル情報が指定されていません');
        return $this->file['type'];
    }


    /**
     * @return mixed
     **/
    abstract public function parse ();
}

