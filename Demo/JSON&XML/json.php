<?php
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);
echo "<br>";
//output
//{"a":1,"b":2,"c":3,"d":4,"e":5}
?>

<?php
class Emp {
    public $name = "";
    public $hobbies  = "";
    public $birthdate = "";
}
$e = new Emp();
$e->name = "Sam";
$e->hobbies  = "sports";
$e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 p");
$e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));

echo json_encode($e);
echo "<br>";
?>

<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));
echo "<br>";
var_dump(json_decode($json, true));

//output

//object(stdClass)#1 (5) {
//["a"] => int(1)
//["b"] => int(2)
//["c"] => int(3)
//["d"] => int(4)
//["e"] => int(5)
//}

//array(5) {
//    ["a"] => int(1)
//    ["b"] => int(2)
//    ["c"] => int(3)
//    ["d"] => int(4)
//    ["e"] => int(5)
//}
?>