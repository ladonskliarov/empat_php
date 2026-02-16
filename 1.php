<h1>Базовий синтаксис PHP</h1>
<?php
// Робота зі змінними, рядками
$age = 24;
$name = 'Ladon';
$surname = 'Skliarov';
$isSent = true;
echo $name . " " . $surname . " ";
?>

</br>
<?php
// Конкатенація
$concatentation1 = "Hello, " . "empat!";
$concatentation2 = "It's a ";
$concatentation2 .= " PHP concatenation.";
$interpolation = " It's interpolation";
echo $concatentation1 . " " . $concatentation2 . "$interpolation";
?>

</br>
<?php
// Масив
$tools = ["PHP", "Javacript", "Typescript", "Dart"];
foreach ($tools as $tool) {
    echo "</br>" . $tool;
}

array_push($tools, "Flutter", "CSS");
echo "</br>" . $tools[5];
?>

</br>
<?php
// Асоціативний масив
$associatedArray = ["Language:" => "Dart", "Framework:" => "Flutter"];
foreach ($associatedArray as $type => $tool) {
    echo $type . " " . $tool;
}
?>

</br>
<?php
// explode, implode
$explodeV = "Example,of,explode,and,implode";
$explodeArr = explode(",", $explodeV);
$implodeV = implode(" ", $explodeArr);
echo $implodeV;
?>

</br>
<?php
// Розіменування
$city = "Kyiv";
$Kyiv = "Capital";
echo $$city;
?>

</br>
<?php
// Порівняння
$comprasionV = 0;
var_dump($comprasionV == "0");
var_dump($comprasionV == false);
// Краще використовувати
var_dump($comprasionV === "0");
var_dump($comprasionV === false);
?>

</br>
<?php
$comprasionV2 = 100;
var_dump($comprasionV2 != "100");
var_dump($comprasionV2 !== "100");
?>

</br>
<?php
echo 100 > 10;
echo 10 < 100;
echo 5 <=> 10;
echo 0 <=> 0;
echo 10 <=> 5;
?>

</br>
<?php
$user = null;
var_dump($user == "");
var_dump($user == 0);
var_dump($user == false);
if ($user === null) {
    echo " User is null";
} else {
    echo " User is available";
}
?>

</br>
<?php
// Кастування
$castV = "10.5";
var_dump((int)$castV);
var_dump((float)$castV);
var_dump((bool)$castV);
var_dump((string)1);
?>