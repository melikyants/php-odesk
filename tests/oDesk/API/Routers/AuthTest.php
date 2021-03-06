<?php
namespace oDesk\API\Tests\Routers;

require_once __DIR__  . '/CommonTestRouter.php';

class AuthTest extends CommonTestRouter
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
    public function testGetUserInfo()
    {
        $router = new \oDesk\API\Routers\Auth($this->_client);
        $response = $router->getUserInfo();
        
        $this->_checkResponse($response);
    }
}
