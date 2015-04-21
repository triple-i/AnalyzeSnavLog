<?php


namespace Asl\Service;

class Category
{

    const PARTS     = 'パーツマニュアル';
    const ST        = 'サービステキスト';
    const SM        = 'サービスマニュアル';
    const OPT       = 'オプション取付要領書';
    const OM        = '取扱説明書';
    const ENG_SM    = 'エンジンワークショップマニュアル';
    const ENG_OM    = 'エンジン取扱説明書';
    const ENG_PARTS = 'エンジンパーツマニュアル';
    const SN        = 'サービスニュース';
    const HIJ       = '品質情報連絡表';
    const SW        = 'サービスワークシート';
    const CKAA      = '改良工事指示書';
    const NINKA     = '許認可';
    const GUIDE     = 'メンテナンスガイド';
    const TROUBE    = '修理事例集';
    const OTHER     = 'その他';


    /**
     * ブック名からカテゴリを導き出す
     *
     * @param  string $book_name
     * @return string
     **/
    public static function convert ($book_name)
    {
        if (substr($book_name, 0, 4) == 'WCLA') {
            $c = self::PARTS;
        } elseif (substr($book_name, 0, 4) == 'WCLC') {
            $c = self::PARTS;
        } elseif (substr($book_name, 0, 4) == 'WCLB') {
            $c = self::PARTS;
        } elseif (substr($book_name, 0, 4) == 'WCLF') {
            $c = self::PARTS;
        } elseif (substr($book_name, 0, 5) == 'PMACS') {
            $c = self::PARTS;
        } elseif (preg_match('/^WCL\d{3}(C|\d)/', $book_name)) {
            $c = self::PARTS;
        } elseif (substr($book_name, 0, 4) == 'WLST') {
            $c = self::ST;
        } elseif (substr($book_name, 0, 4) == 'WLSM') {
            $c = self::SM;
        } elseif (substr($book_name, 0, 3) == 'WHE') {
            $c = self::SM;
        } elseif (substr($book_name, 0, 5) == 'WLOPT') {
            $c = self::OPT;
        } elseif (substr($book_name, 0, 3) == 'WDL') {
            $c = self::OM;
        } elseif (substr($book_name, 0, 3) == 'WDE') {
            $c = self::OM;
        } elseif (substr($book_name, 0, 4) == 'WSM_') {
            $c = self::ENG_SM;
        } elseif (preg_match('/_OM$/', $book_name)) {
            $c = self::ENG_OM;
        } elseif (preg_match('/^\d{1}\w+-\w{6}/', $book_name)) {
            $c = self::ENG_PARTS;
        } elseif (preg_match('/SN/', $book_name)) {
            $c = self::SN;
        } elseif (preg_match('/hij/', $book_name)) {
            $c = self::HIJ;
        } elseif (preg_match('/SW/', $book_name)) {
            $c = self::SW;
        } elseif (preg_match('/CKAA/', $book_name)) {
            $c = self::CKAA;
        } elseif (preg_match('/NINKA/', $book_name)) {
            $c = self::NINKA;
        } elseif (preg_match('/MAINTENANCEGUIDE/', $book_name)) {
            $c = self::GUIDE;
        } elseif (preg_match('/TROUBLENEWS/', $book_name)) {
            $c = self::TROUBE;
        } else {
            $c = self::OTHER;
        }

        return $c;
    }
}

