<?php
namespace InternetNL\Laravel\Tests;

use Internetnl;

class InternetNLTest extends TestCase
{


	private $results;

    /**
     * Check that the multiply method returns correct result
     * @return void
     */
    public function testAddDomainsTest() 
    {
	    $response = Internetnl::web('test', array('www.provinciegroningen.nl', 'provinciegroningen.nl'));
	    $results = $response->getData()->getResults();
	    $this->assertTrue($response->getSuccess());

    }
    
    public function testGetResultsTest()
    {
	    $response = Internetnl::results('4100d73736a940d08216779f2f923ca8');
	    var_dump($response);
	    $this->assertTrue(true);
    }
}
