    <?php
		function hello() {
		$name = "danna";
	if ($name == "danna") {
    echo "finally said hello $name!";
    }
	}
	hello();
    ?>

	/* this is a looping associative array */
	
	<?php
	$income = array("Mike"=>"$35,000", "Danna"=>"$0", "Sam"=>"$91,000");

	foreach($income as $x => $x_value) {
		echo "<br>";
		echo $x . " makes " . $x_value . " per year.";
	}
	?>
	<?php
    $thing = "a big ol' thing";
    $thing1 = "<h1> . $thing . </h1>";
    echo "<br>";
    echo $thing1;
    var_dump($thing1);
	?>

    <?php
class States {
    function echoCities () {
        return "Houston";
    }
}

    $texas = new States();
    // $texas->{'echoCities'} = "Houston";



    $georgia = new States;
    // var_dump($texas);
    // var_dump($georgia);
    echo "<br>";
    echo $texas->echoCities();
    echo "<br>";
    echo $georgia->echoCities();
    echo "<br>";


    ?>

<!-- PLEASE CORRECT ME WHERE I AM WRONG IN THE NOTES -->
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

<?php 
$carColors = array();
$carColors[0] = "Red";
$carColors[1] = "Blue";
$carColors[2] = "White";

$herbie->{"carColors"} = $carColors;

?>
<pre>
<?php
var_dump($herbie);
echo "<br>";
print_r(array_values($carColors));
?>
</pre>

<pre>
<?php
$carColors[4] = "Pink";
$herbie->{"carColors"} = $carColors;
var_dump($herbie);
?>
</pre>
