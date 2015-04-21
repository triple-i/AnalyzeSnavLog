<?php


use Asl\Service\Analyzer;

class AnalyzerTest extends \PHPUnit_Framework_TestCase
{

    private $log_file = 'data/log.csv';


    /**
     * @return
     **/
    public function setUp ()
    {
    }


    /**
     * @test
     * @group analyze-get-regex-date
     * @group analyze
     **/
    public function 解析の対象日付範囲を取得する ()
    {
        $log = ROOT.DS.$this->log_file;

        $service = new Analyzer($log);
        $this->assertEquals('.*', $service->getRegexDate());

        $service = new Analyzer($log, '2015/03');
        $this->assertEquals('2015\/03', $service->getRegexDate());

        $service = new Analyzer($log, '2015/04/12');
        $this->assertEquals('2015\/04\/12', $service->getRegexDate());
    }


    /**
     * @test
     * @group analyze-total-access
     * @group analyze
     **/
    public function 月別に合計アクセス数を分析する ()
    {
        $log = ROOT.DS.$this->log_file;

        $service = new Analyzer($log, '2015/04');
        $result  = $service->analyzeTotalAccess();

        $this->assertEquals(1, count($result));
        $this->assertArrayHasKey('2015年04月', $result);
        $this->assertEquals(55, $result['2015年04月']);


        $service = new Analyzer($log);
        $result  = $service->analyzeTotalAccess();

        $this->assertEquals(3, count($result));
    }


    /**
     * @test
     * @group analyze-user-access
     * @group analyze
     **/
    public function 月別に利用者数を分析する ()
    {
        $log = ROOT.DS.$this->log_file;

        $service = new Analyzer($log, '2015/04');
        $result  = $service->analyzeUserAccess();

        $this->assertEquals(1, count($result));
        $this->assertArrayHasKey('2015年04月', $result);
        $this->assertEquals(5, $result['2015年04月']);

        $service = new Analyzer($log);
        $result  = $service->analyzeUserAccess();

        $this->assertEquals(3, count($result));
        $this->assertEquals(5, $result['2015年04月']);
        $this->assertEquals(4, $result['2015年03月']);
        $this->assertEquals(2, $result['2015年02月']);
    }


    /**
     * @test
     * @group analyze-book-access-top20
     * @group analyze
     **/
    public function ブックアクセス数Top20を分析する ()
    {
        $log = ROOT.DS.'data'.DS.'top20.log.csv';

        $service = new Analyzer($log, '2014/01');
        $result = $service->analyzeBookAccessTop20();

        $this->assertArrayHasKey('2014年01月', $result);
        $this->assertEquals(20, count($result['2014年01月']));
    }


    /**
     * @test
     * @group analyze-user-access-top20
     * @group analyze
     **/
    public function ユーザアクセス数Top20を分析する ()
    {
        $log = ROOT.DS.'data'.DS.'top20.log.csv';

        $service = new Analyzer($log, '2014/02');
        $result = $service->analyzeUserAccessTop20();

        $this->assertArrayHasKey('2014年02月', $result);
        $this->assertEquals(20, count($result['2014年02月']));
    }


    /**
     * @test
     * @group analyze-user-date-access
     * @group analyze
     **/
    public function 日別の利用者数を分析する ()
    {
        $log = ROOT.DS.'data'.DS.'date.log.csv';

        $service = new Analyzer($log, '2015/04');
        $result = $service->analyzeUserDateAccess();

        $this->assertEquals(10, count($result));
    }


    /**
     * @test
     * @group analyze-book-category
     * @group analyze
     **/
    public function ブックカテゴリ別アクセス数を分析する ()
    {
        $log = ROOT.DS.'data'.DS.'category.log.csv';

        $service = new Analyzer($log, '2015/04');
        $result = $service->analyzeBookCategory();

        $this->assertEquals(17, count($result));
    }
}

