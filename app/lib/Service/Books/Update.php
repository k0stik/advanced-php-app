<?php

namespace Service\Books;

class Update extends \Service\Base {

    public function validate($params = array()) {
        return $params;
    }

    public function execute($params = array()) {
        return array('status' => 1);
    }
}

?>