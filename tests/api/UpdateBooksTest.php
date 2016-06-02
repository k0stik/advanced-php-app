<?php

class UpdateBooksTest extends Slim_Framework_TestCase
{
    public function testPositive()
    {
        $id = 1;
        $this->put('/api/books/' . $id, array('name' => 'Test2'));
        $this->assertEquals(200, $this->response->status());

        $json = json_decode($this->response->body(), true);

        $this->assertTrue( is_array( $json ) );
        $this->assertEquals( 1, $json['status'] );
    }
}

/* End of file GetMethodTest.php */