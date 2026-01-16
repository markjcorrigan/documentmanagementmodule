<?php

class Cars
{
    public static $wheel_count = 4;  // NB set properties to static

    public static $door_count = 9;  // php is listening to us.  I.e. you are asking for a regular property but you declared it static.  Where is the static property.

    public static function car_detail()  // NB static
    {
        echo Cars::$wheel_count;

    }
}

class Trucks extends Cars {}

$bmw = new Cars;

$tacoma = new Trucks;
// echo $bmw->wheel_count;  //NB don't use $ as attached to the instance.
echo Cars::$door_count;  // Use $ as this comes from the class.
//

echo '<br>';
echo Cars::car_detail();
// echo $bmw->door_count;  //not available outside class
// echo $bmw->seat_count;  //not available outside class or inherited class.

/*<?php namespace foo;
  class Cat {
    static function says() {echo 'meoow';}  } ?>
 */
