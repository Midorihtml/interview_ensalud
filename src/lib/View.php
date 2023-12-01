<?php

namespace Src\lib;

class View{

    public function render(string $name, array $data = []){
        $this-> d = $data;
        require 'src/views/' . $name . '/index.php';
    }
}

