<?php

class IndexBooksTest extends Slim_Framework_TestCase
{
    public function testPositive()
    {
        $this->get('/api/books/');
        $this->assertEquals(200, $this->response->status());
        $json = json_decode($this->response->body(), true);

        $this->assertTrue( is_array( $json ) );

        $this->assertEquals( 1,      $json['status']          );
        $this->assertEquals( 1,      $json['count']           );
        $this->assertTrue(   true,   is_array($json['rows'])  );
        $this->assertEquals( 1,      count($json['rows'])     );
        $this->assertEquals( 1,      $json['rows'][0]['id']   );
        $this->assertEquals( 'Test', $json['rows'][0]['name'] );
    }
}

/* End of file GetMethodTest.php */
