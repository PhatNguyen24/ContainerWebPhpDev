<?php

$uri = "mysql://avnadmin:AVNS_pAW2BeglFY8_fkCunMu@mysqldb-webncdb.h.aivencloud.com:20343/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=QUANLYSACH";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
  $db = new PDO($conn, $fields["user"], $fields["pass"]);

//   $stmt = $db->query("SELECT VERSION()");
    $row = $db->query("select * from User");
//   print($stmt->fetch()[0]);
    if($row->rowCount()>0){
        while ($r = $row->fetchObject()){
            echo $r->TenUser;
            echo $r->MatKhau;

        }
    }
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
