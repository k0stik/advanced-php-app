<?php

namespace Service;

/**
 *  @class \Service\X
 *
 */

class X extends \Exception {

    private $fileds;

    private $type;

    public function __construct( $attrs ) {
        $this->fields = $attrs['fields'];
        $this->type   = $attrs['type'];
    }

    public function getError() {
        return [
            'error' => [
                'fields'  => $this->fields,
                'type'    => $this->type,
            ]
        ];
    }
}

?>