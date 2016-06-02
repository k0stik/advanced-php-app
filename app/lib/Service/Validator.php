<?php

namespace Service;

class Validator {

    static public function validate( $data, $livr ) {

        $validator = new \Validator\LIVR( $livr );

        $validated = $validator->validate($data);

        if ( $validated ) {

            return $validated;

        } else {
            throw new X([ 'type' => 'FORMAT_ERROR', 'fields' => $validator->getErrors() ]);
        }
    }
}

?>