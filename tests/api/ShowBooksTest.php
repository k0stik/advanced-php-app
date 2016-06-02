<?php

class ShowBooksTest extends Slim_Framework_TestCase
{
    public function testPositive()
    {
        $id = 1;

        $this->get('/api/books/' . $id);

        $this->assertEquals(200, $this->response->status());

        $json = json_decode($this->response->body(), true);

        $this->assertTrue( is_array( $json ) );

        $this->assertEquals( 1, $json['status'] );

        $this->assertTrue( is_array($json['book']) );

        $this->assertEquals(    $id, $json['book']['id']   );
        $this->assertEquals( 'Test', $json['book']['name']   );
    }

    public function testNegative() {
        $id = 99999;

        $this->get('/api/books/' . $id);

        $this->assertEquals(200, $this->response->status());

        $json = json_decode($this->response->body(), true);

        $this->assertTrue( is_array( $json ) );

        $this->assertTrue( is_array( $json['error'] ) );
        $this->assertTrue( is_array( $json['error']['fields'] ) );
        $this->assertArrayHasKey( 'id', $json['error']['fields'] );
        $this->assertTrue( $json['error']['fields']['id'] ? true : false );
    }
}

?>