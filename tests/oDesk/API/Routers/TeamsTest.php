<?php
namespace oDesk\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class TeamsTest extends CommonTestRouter
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
    public function testGetList()
    {
        $router = new \oDesk\API\Routers\Teams($this->_client);
        $response = $router->getList();
        
        $this->_checkResponse($response);
    }

    /**
     * @test
     */
    public function testGetSpecific()
    {
        $router = new \oDesk\API\Routers\Teams($this->_client);
        $response = $router->getSpecific('teamid', array());
        
        $this->_checkResponse($response);
    }
}
