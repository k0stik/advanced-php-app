<?php

namespace Service;

abstract class Base {

    public function run( $params ) {
        try {

            $validated = $this->validate( is_array($params) ? $params : [] );
            $result = $this->execute( $validated );

            return $result;
        }
        catch ( Exception $e ) {
            throw $e;
        }
    }
}

?>