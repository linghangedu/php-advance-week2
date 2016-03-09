<?php
$myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
print_r($xml);
echo "<br>";
var_dump($xml);
?>


<?php
$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
print_r($xml);
echo "<br>";
?>


<?php
$xml=<<<XML
<?xml version="1.0" standalone="yes"?>
<cars>
  <car id="1">Volvo</car>
  <car id="2">BMW</car>
  <car id="3">Saab</car>
</cars>
XML;

$sxe=new SimpleXMLElement($xml);
echo $sxe->getName() . "<br>";
foreach ($sxe->children() as $child)
{
    echo $child->getName() . "<br>";
}

$ns=$sxe->getNamespaces(true);
print_r($ns);
echo "<br>";
?>

<?php
$note=<<<XML
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>
XML;

$xml = new SimpleXMLElement($note);
$xml->addAttribute("type","private");
$xml->body->addAttribute("date","2014-01-01");

echo $xml->asXML();
echo "<br>";
// Add a child element to the body element
$xml->body->addChild("date","2014-01-01");
// Add a child element after the last element inside note
$footer = $xml->addChild("footer","Some footer text");

echo $xml->asXML();
?>


<?php
$xml=<<<XML
  <cars>
    <car name="Volvo">
    <child/>
    <child/>
    <child/>
    <child/>
  </car>
  <car name="BMW">
    <child/>
    <child/>
  </car>
</cars>
XML;

$elem=new SimpleXMLElement($xml);
foreach ($elem as $car)
{
    printf("%s has %d children.<br>", $car['name'], $car->count());
}
?>