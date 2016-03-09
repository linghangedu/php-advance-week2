<?php
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}
print Foo::$my_static . "<br>";
$foo = new Foo();
print $foo->staticValue() . "<br>";
?>
<?php
class MyClass
{
    public static $count = 0;

    public static function plusOne()
    {
        return "The count is " . ++self::$count . ".<br />";
    }
}
do
{
    // Call plusOne without instantiating MyClass
    echo MyClass::plusOne();
} while ( MyClass::$count < 10 );

?>