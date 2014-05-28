<?php
namespace oDesk\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class PaymentsTest extends CommonTestRouter
{
    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function testGetAdjustments()
    {
        $router = new \oDesk\API\Routers\Payments($this->_client);
        $response = $router->getAdjustments('12345', array());
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testSubmitBonus()
    {
        $router = new \oDesk\API\Routers\Payments($this->_client);
        $response = $router->submitBonus('12345', array());
        
        $this->_checkResponse($response);
    }
}
