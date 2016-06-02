<?php

namespace RestAPI\Controller;

class Books extends Base {

    public function show($id) {
        $self = $this;

        $this->run(function() use ($self, $id) {
            return $self->action("Service\Books\Show")->run(['id' => $id]);
        });
    }

    public function index () {
        $self = $this;
        $data = $this->request()->params();

        $this->run(function() use ($self, $data) {
            return $self->action("Service\Books\Index")->run($data);
        });
    }

    public function create () {
        $self = $this;
        $data = $this->request()->params();

        $this->run(function() use ($self, $data) {
            return $self->action("Service\Books\Create")->run($data);
        });
    }

    public function update ($id) {
        $self = $this;
        $data = $this->request()->params();

        $data['id'] = $id;

        $this->run(function() use ($self, $data) {
            return $self->action("Service\Books\Update")->run($data);
        });
    }

    public function delete ($id) {
        $self = $this;

        $this->run(function() use ($self, $id) {
            return $self->action("Service\Books\Delete")->run(['id' => $id]);
        });
    }
}

?>