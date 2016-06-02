<?php

namespace RestAPI\Controller;

use \Slim\Slim as Slim;

abstract class Base {

    protected $app;

    public function __construct(Slim $app) {
        $this->app = $app;

        return $this;
    }

    /**
     *  Auto redefined Slim methods to Controller class.
     *      @see        Magic methods in PHP
     *      @param      string      $method     - method name
     *      @param      array       $arguments  - arguments list
     *      @return     mix                     - result of calling Slim '$method'
     */
    public function __call($method, $arguments) {
        $app = $this->app;

        if ( method_exists($app, $method) ) {
            return call_user_func_array(array(&$app, $method), $arguments);
        }
    }

    /**
     *  void renderJson( $json )   - print JSON string
     *      @param      array       $data   - json structure
     *      @param      string      $type   - content-type header (default 'application/json')
     *      @return     void
     */
    public function renderJson($data, $type = 'application/json') {
        $this->response()->header('Content-Type', $type);
        $this->response()->write( json_encode( $data ) );
        $this->stop();
    }

    /**
     *  Object log() - return log property for Slim object. It was defined in RestAPI script
     */
    public function log() {
        return $this->app->log;
    }

    public function run($cb) {

        try {
            $result = call_user_func($cb);
            $this->renderJson( $result );
        }
        catch ( \Service\X $e ) {
            $this->renderJson( $e->getError() );
        }
        catch ( Exception $e ) {
            die($e);
        };
    }

    public function action($class) {
        return new $class();
    }
}

?>