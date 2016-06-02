<?php

class IndexText extends Slim_Framework_TestCase
{

    public function testNegative() {

        $this->get('/invalid_resource');
        $this->assertEquals(404, $this->response->status());
    }

    public function testPositive() {

        $this->get('/');
        $this->assertEquals(200, $this->response->status());
        $this->assertContains('Slim Framework for PHP 5', $this->response->body());
    }
}

/* End of file GetMethodTest.php */
