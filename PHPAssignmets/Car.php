<pre>
<?php
class Car {

        public function __construct($model, $make, $color) {
        $this->model = $model;              
        $this->make = $make;                
        $this->color = $color;           
}                                         
}
// create an object
$herbie = new Car("Beatle", "VW", "Yellow" );
var_dump($herbie);
$bessie = new Car("letgo","Yugo", "Rust" );
var_dump($bessie);

// show object properties
echo $herbie->model;
echo $bessie->one;
echo "<br>";
echo "My $herbie->model is a $bessie->one.";
?>
</pre>

/* https://www.learn-php.org/en/Objects */