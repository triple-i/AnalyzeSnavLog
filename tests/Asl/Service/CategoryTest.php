<?php


use Asl\Service\Category;

class CategoryTest extends \PHPUnit_Framework_TestCase
{

   /**
     * @test
     * @group category
     **/
    public function ブックカテゴリを取得する ()
    {
        $book = 'WCLA120A3000_007';
        $this->assertEquals('パーツマニュアル', Category::convert($book));

        $book = 'WCLC120A3000_007';
        $this->assertEquals('パーツマニュアル', Category::convert($book));

        $book = 'WCLB120A3000_007';
        $this->assertEquals('パーツマニュアル', Category::convert($book));

        $book = 'PMACS_WCLA240A30LM_000_240A3-5001';
        $this->assertEquals('パーツマニュアル', Category::convert($book));

        $book = 'WCL0751-00_002';
        $this->assertEquals('パーツマニュアル', Category::convert($book));

        $book = 'WCL135C-00_000';
        $this->assertEquals('パーツマニュアル', Category::convert($book));

        $book = 'WLST0753B-01J';
        $this->assertEquals('サービステキスト', Category::convert($book));

        $book = 'WLSM1253B-00J';
        $this->assertEquals('サービスマニュアル', Category::convert($book));

        $book = 'SN2';
        $this->assertEquals('サービスニュース', Category::convert($book));

        $book = 'R_SN';
        $this->assertEquals('サービスニュース', Category::convert($book));

        $book = 'SN2_EN';
        $this->assertEquals('サービスニュース', Category::convert($book));

        $book = 'hij';
        $this->assertEquals('品質情報連絡表', Category::convert($book));

        $book = 'SW';
        $this->assertEquals('サービスワークシート', Category::convert($book));

        $book = 'R_SW';
        $this->assertEquals('サービスワークシート', Category::convert($book));

        $book = 'CKAA';
        $this->assertEquals('改良工事指示書', Category::convert($book));

        $book = 'NINKA_SH_005';
        $this->assertEquals('許認可', Category::convert($book));

        $book = 'MAINTENANCEGUIDE';
        $this->assertEquals('メンテナンスガイド', Category::convert($book));

        $book = 'TROUBLENEWS';
        $this->assertEquals('修理事例集', Category::convert($book));

        $book = 'WSM_6HK1_4HK1';
        $this->assertEquals('エンジンワークショップマニュアル', Category::convert($book));

        $book = '6H_OM';
        $this->assertEquals('エンジン取扱説明書', Category::convert($book));

        $book = '4JJ1-XYSS02_SH120-5';
        $this->assertEquals('エンジンパーツマニュアル', Category::convert($book));

        $book = 'WLOPT3306-00J-120';
        $this->assertEquals('オプション取付要領書', Category::convert($book));

        $book = 'WDL0806-0K';
        $this->assertEquals('取扱説明書', Category::convert($book));

        $book = 'WDE0120-002';
        $this->assertEquals('取扱説明書', Category::convert($book));

        $book = 'WHE0060-001';
        $this->assertEquals('サービスマニュアル', Category::convert($book));

        $book = 'WCLF330L3-6237';
        $this->assertEquals('パーツマニュアル', Category::convert($book));
    }
}

