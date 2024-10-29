<?php
class Stack{
    private $MAX_SIZE = 5;
    private $stack;

    public function __construct(){
        $this->stack = array();
    }

    public function isFull(){
        return count($this->stack) == $this->MAX_SIZE;
    }

    public function isEmpty(){
        return empty($this->stack);
    }

    public function push($item){
        if($this->isFull()){
            echo "Stacknya Full!!";
        }else{
            array_push($this->stack, $item);
        }
        
    }

    public function pop(){
        if($this->isEmpty()){
            return array_pop($this->stack);
        }else{
            return null;
        }
    }

    public function peek(){
        if(!$this->isEmpty()){
            return end($this->stack);
        }else{
            return null;
        }
    }

    
}

$myStack = new Stack();
$myStack->push("harimau");
$myStack->push("gajah");
$myStack->push("singa");
$myStack->push("elang");
$myStack->push("beruang");

$myStack->peek();
$myStack->pop();

// echo $myStack;