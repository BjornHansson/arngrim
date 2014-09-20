<?php
class StatisticsTest extends PHPUnit_Extensions_Selenium2TestCase
{
    const BASE_URL = "http://localhost/arngrim/index.php";

    protected function setUp()
    {
        $this->setBrowser("firefox");
        $this->setBrowserUrl(self::BASE_URL);
    }

    public function testTitle()
    {
        $this->url(self::BASE_URL);
        $this->assertEquals("Arngrim - Bug and issue tracker", $this->title());
    }
}