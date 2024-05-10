<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Thực hiện kiểm tra thông tin tài khoản ở đây
    // Kết nối database và thực hiện truy vấn
    try {
        $uri = "mysql://avnadmin:AVNS_pAW2BeglFY8_fkCunMu@mysqldb-webncdb.h.aivencloud.com:20343/defaultdb?ssl-mode=REQUIRED";
        $fields = parse_url($uri);

        // Build the DSN including SSL settings
        $conn = "mysql:host=" . $fields["host"];
        $conn .= ";port=" . $fields["port"];
        $conn .= ";dbname=QUANLYSACH";
        $conn .= ";sslmode=REQUIRED"; // Note: The SSL mode can be 'REQUIRED' or 'verify-ca', depending on your SSL setup.
        $conn .= ";sslrootcert=ca.pem";

        $db = new PDO($conn, $fields["user"], $fields["pass"]);

        $stmt = $db->prepare("SELECT * FROM User WHERE TenUser = :username AND MatKhau = :password");
        $stmt->bindParam(':username', $input_username);
        $stmt->bindParam(':password', $input_password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Đăng nhập thành công, hiển thị bảng danh sách sách
            echo "<h2>Danh sách sách</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Mã Sách</th>
                        <th>Tên Sách</th>
                        <th>Số Lượng</th>
                    </tr>";

            $stmt = $db->query("SELECT * FROM Sach");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['MaSach'] . "</td>";
                echo "<td>" . $row['TenSach'] . "</td>";
                echo "<td>" . $row['SoLuong'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Tên người dùng hoặc mật khẩu không đúng.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
