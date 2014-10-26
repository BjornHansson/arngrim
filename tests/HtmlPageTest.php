<?php
class HtmlPageTest extends PHPUnit_Framework_TestCase
{
    // Regex for getHead and getFooter methods
    private $regexHead = "/<body>(.+)";
    private $regexFooter = "(.+)<\/body>/s";

    public function testThatPrintHomePageOutputsHtml()
    {
        // Given
        $hp = new HtmlPage();
        // Then
        $this->expectOutputRegex($this->regexHead . "<table(.+)<table" . $this->regexFooter);
        // When
        $hp->printHomePage();
    }

    public function testThatPrintWriteIssuePageOutputsHtml()
    {
        // Given
        $hp = new HtmlPage();
        // Then
        $this->expectOutputRegex($this->regexHead . "<form" . $this->regexFooter);
        // When
        $hp->printWriteIssuePage();
    }

    public function testThatPrintStatisticsPageOutputsHtml()
    {
        // Given
        $hp = new HtmlPage();
        // Then
        $this->expectOutputRegex($this->regexHead . "chartDiv1(.+)chartDiv2" . $this->regexFooter);
        // When
        $hp->printStatisticsPage();
    }

    public function testThatPrintCloseIssuePageOutputsHtml()
    {
        // Given
        $hp = new HtmlPage();
        $testNr = 1337;
        // Then
        $this->expectOutputRegex($this->regexHead . "<form(.+)id=" . $testNr . $this->regexFooter);
        // When
        $hp->printCloseIssuePage($testNr);
    }
}