<?php
namespace ThanksgivingTests;

class ThanksgivingTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider values
     */
    public function testIsThanksgiving($input, $expectedOutput)
    {
        $result = isThanksgiving($input);

        $this->assertInternalType("bool", $result);
        $this->assertEquals(
            $expectedOutput,
            $result,
            sprintf(
                "Expecting %s to be %s",
                $input,
                date('c', getThanksgiving(date("Y", strtotime($input))))
            )
        );
    }

    public function values()
    {
        return [
            // correct
            ["2010-11-25", true],
            ["2011-11-24", true],
            ["2012-11-22", true],
            ["2013-11-28", true],
            ["2014-11-27", true],
            ["2015-11-26", true],

            // off by one
            ["2010-11-24", false],
            ["2011-11-25", false],
            ["2012-11-21", false],
            ["2013-11-29", false],
            ["2014-11-26", false],
            ["2015-11-27", false],

            // different month
            ["2015-10-27", false],
            ["2015-9-27", false],
            ["2015-8-27", false],
            ["2015-7-27", false],
            ["2015-6-27", false],
            ["2015-5-27", false],

            // future
            ["2017-11-23", true],
            ["2018-11-22", true],
            ["2019-11-28", true],
            ["2020-11-26", true],
        ];
    }
}
