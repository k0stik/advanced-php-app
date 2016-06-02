<?php

namespace Service\Books;

class Show extends \Service\Base {

    public function validate($params = array()) {

        $rules = [
            'id' => ['required', ['one_of' => [ [1, 2] ]]]
        ];

        return \Service\Validator::validate($params, $rules);
    }

    public function execute($params = array()) {
        return $params['id'] == 1
            ? array('status' => 1, 'book' => array('id' => $params['id'], 'name' => 'Test'))
            : array('status' => 0);
    }
}

?>