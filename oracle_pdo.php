<?php
$db_user = '';
$db_pass = '';

try {
    $con = new PDO("oci:dbname=XE", $db_user, $db_pass);
    // foreach (PDO::getAvailableDrivers() as $driver) {
    //     echo $driver . '<br/>';
    // }
    $sql = 'Select * from user_info';
    $result = $con->query($sql);
    $errorInfo = $con->errorInfo();

    if(isset($errorInfo[2])){
        $error = $errorInfo[2];
    }
    echo "<hr>$sql</h4>";
    echo "<table border='1'>\n";
    
    echo "<tr>";
    echo "<td>"."id"."</td>";
    echo "<td>" . "name" . "</td>";
    echo "<td>" . "address" . "</td>";
    echo "<td>" . "email" . "</td>";
    echo "</tr>";

    while ($row = getRow($result)) {
        echo "<tr>\n";
        foreach ($row as $item) {

            echo "<td>" . $item . "</td>";
        }
        echo "</tr>\n";
    }
    echo "<table>\n";

} catch (PDOException $e) {
    echo ($e->getMessage());
}

function getRow($result)
{
    return $result->fetchObject();
}
