 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <body>
 <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "anjumh";
$password = "hGXzpppioQHWmQ==";
$dbname = "anjumh_";

echo "<br><br><table>";




try {
    $conn = new PDO("mysql:host=promo-24.codeur.online;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


    //SELECT * FROM `table 1` WHERE `last_name`= 'palmer' 
    $stmt = $conn->prepare ("SELECT * FROM `table 1` WHERE `last_name`= 'palmer'");
    $stmt->execute();

    

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
echo "</table>";

echo "<br><br><table>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
//     //Afficher toutes les femmes.

// // SELECT * FROM `table 1` WHERE `gender` = 'female' 
    $stmt = $conn->prepare ("SELECT * FROM `table 1` WHERE `gender` = 'female'");
 $stmt->execute();

 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
     echo $v;
 }
echo "</table>";
 

echo "<br><br><table>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}



//3) Tous les états(country code) dont la lettre commence par N

    $stmt = $conn->prepare (" SELECT * FROM `table 1` WHERE `country_code` ='N'");
 $stmt->execute();

 // set the resulting array to associative
 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
 foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
     echo $v;
 }
echo "</table>";

?>
  
 </body>
 </html>
 
 

 


   