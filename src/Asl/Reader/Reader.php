<?php


namespace Asl\Reader;

use Asl\Reader\Parser\AbstractParser;

class Reader
{

    /**
     * @var ParserInterface
     **/
    private $parser;


    /**
     * @return void
     **/
    public function __construct (AbstractParser $parser)
    {
        $this->parser = $parser;
    }


    /**
     * @return AbstractParser
     **/
    public function getParser ()
    {
        return $this->parser;
    }


    /**
     * @param  array $file
     * @return void
     **/
    public function setFile ($file)
    {
        $this->parser->setFile($file);
    }


    /**
     * @return string
     **/
    public function getFileName ()
    {
        return $this->parser->getFileName();
    }


    /**
     * @return string
     **/
    public function getFilePath ()
    {
        return $this->parser->getFilePath();
    }


    /**
     * @return string
     **/
    public function getFileType ()
    {
        return $this->parser->getFileType();
    }


    /**
     * @return mixed
     **/
    public function parse ()
    {
        if (is_null($this->parser)) throw new \Exception('パーサーが指定されていません ');
        return $this->parser->parse();
    }
}

