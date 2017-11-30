<?php

/**
 * Trying to understand constructors and how it works
 */
class one
{
    public $prop;

    public function __construct()
    {
        echo "<h2>This is One class.</h2>";
        $this->prop = 'Property from construct of class one </br> ';
        echo $this->prop;
    }

    public function myView()
    {
        return $this->prop;
    }
}

class two extends one
{
    public $prop = '';

    public function __construct()
    {
        // calling parent constructor - property of class 2 will be "This is One class. Property from construct </br>"
        parent::__construct();
        echo '<h2>This is second class.</h2>';
        // just looking at the $prop to be sure what it not "Willy in prop of second class </br>"
        self::test();
        // just reloading this $prop to be sure what i want to see
        $this->prop = "Willy in prop of second class </br>";
        // and testing - "what we get"
//        self::test();
    }

    public function test()
    {
//       echo parent::myView() .'</br>';
        echo $this->prop;
    }
}

$aho = new two();
//echo "Calling test method of class 2 </br>";
echo "Just to be shure - what property of class two is reassigned normally : </br>";
$aho->test();
