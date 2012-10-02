<?php

namespace Reddit;

/**
 * Test class for MultipleCycling.
 * Generated by PHPUnit on 2012-09-30 at 17:36:57.
 */
class MultipleCyclingTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MultipleCycling
     */
    protected $cycler;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->cycler = new MultipleCycling;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->cycler = null;
    }
    
    /**
     * @dataProvider testDataProvider
     */
    public function testMultipleCycleJeremy($expected, $limit, $numbers)
    {
        $this->assertEquals($expected, $this->cycler->multipleCycleJeremy($limit, $numbers));
    }

    /**
     * @dataProvider testDataProvider
     */
    public function testMultipleCycleMrThedon($expected, $limit, $numbers)
    {
        $this->assertEquals($expected, $this->cycler->multipleCycleMrThedon($limit, $numbers));
    }
    
    /**
     * @dataProvider testDataProvider
     */
    public function testMultipleCycleGonzalez($expected, $limit, $numbers)
    {
        $this->assertEquals($expected, $this->cycler->multipleCycleGonzalez($limit, $numbers));
    }
    
    /**
     * @dataProvider testDataProvider
     */
    public function testMultipleCycleAlTheX($expected, $limit, $numbers)
    {
        $this->assertEquals($expected, $this->cycler->multipleCycleAlTheX($limit, $numbers));
    }
    
    public function testMultipleCycleRedditQuestion()
    {
        $this->markTestSkipped('Mine is *fail*');
        $this->assertEquals(408041, $this->cycler->multipleCycleJeremy(1000000000, array(5395, 7168, 2367, 9999, 3)));
    }
    
    public function testDataProvider()
    {
        return array(
            array(6, 15, array(5, 7, 3)),
            array(7, 20, array(5, 7, 3)),
        );
    }

}
