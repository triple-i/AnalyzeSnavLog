<?php


namespace Asl\Reader\Parser;

class CsvParser extends AbstractParser
{

    /**
     * @var FilePointer
     **/
    private $fp;


    /**
     * @var int
     **/
    private $row_counter = 0;


    /**
     * @return void
     **/
    public function __destruct ()
    {
        if (! is_null($this->fp)) fclose($this->fp);
    }


    /**
     * @var void
     **/
    private function _validateFilePointer ()
    {
        if (is_null($this->fp)) $this->initFilePointer();
    }


    /*
     * CSV解析メソッド
     * fgetのファイルポインタでまわして値を取得
     *
     * @return array
     */
    private function _fetchRow ()
    {
        $this->_countUpRowCounter();

        $length = 1000;
        $delimiter = ',';
        $quote = '"';

        $delimiter = preg_quote($delimiter);
        $quote = preg_quote($quote);
        $_line = fgets($this->fp, $length);
        $eof = null;

        if ($delimiter === ',') {
            $_csv_line = preg_replace('/(?:\r\n|[\r\n])?$/', $delimiter, trim($_line));
        } else {
            $_csv_line = preg_replace('/(?:\r\n|[\r\n])?$/', $delimiter, trim($_line, " \n\r\0\x0B"));
        }

        $_csv_pattern = '/('.$quote.'[^'.$quote.']*(?:'.$quote.$quote.'[^'.$quote.']*)*'.$quote.'|[^'.$delimiter.']*)'.$delimiter.'/';
        preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
        $_csv_data = $_csv_matches[1];

        for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++) {
            $_csv_data[$_csv_i] = preg_replace('/^'.$quote.'(.*)'.$quote.'$/s', '$1', $_csv_data[$_csv_i]);
            $_csv_data[$_csv_i] = str_replace($quote.$quote, $quote, $_csv_data[$_csv_i]);
        }

        return empty($_line) ? false : $_csv_data;
    }


    /**
     * 行数カウンタをひとつ上げる
     *
     * @return void
     **/
    private function _countUpRowCounter ()
    {
        $this->row_counter += 1;
    }


    /**
     * 行数カウンタをひとつ下げる
     *
     * @return void
     **/
    private function _countDownRowCounter ()
    {
        $this->row_counter -= 1;
    }


    /**
     * ファイルポインタの初期化処理
     *
     * @return void
     **/
    public function initFilePointer ()
    {
        $this->fp = fopen($this->getFilePath(), 'r');
        rewind($this->fp);

        $this->row_counter = 0;
    }


    /**
     * @return array
     **/
    public function parse ()
    {
        $this->_validateFilePointer();
        return $this->_fetchRow();
    }


    /**
     * 現在行の列数を取得する
     *
     * @return int
     **/
    public function getNumberOfColumn ()
    {
        $this->_validateFilePointer();
        return count(fgetcsv($this->fp, 1000, ','));
    }


    /**
     * 現在の行数を取得する
     *
     * @return int
     **/
    public function getNumberOfRow ()
    {
        $this->_validateFilePointer();
        return $this->row_counter;
    }
}

