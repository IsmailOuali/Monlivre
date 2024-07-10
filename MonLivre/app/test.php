<?php

 interface TestInterface{
    public function index(){
        echo "INDEX";
    }
}
 interface RunInterface{

    public function definition(){
        echo "definition";
    }
}


class  output implements RunInterface, TestInterface{

        public function definition();
}