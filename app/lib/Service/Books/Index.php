<?php

namespace Service\Books;

class Index extends \Service\Base {

    public function validate($params = array()) {
        return $params;
    }

    public function execute($params = array()) {
        return array(
            'status' => 1,
            'rows'   => array( array('id' => 1, 'name' => 'Test') ),
            'count'  => 1
        );
    }
}

?>