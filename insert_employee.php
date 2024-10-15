<?php
include 'condb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $eaddress = mysqli_real_escape_string($conn, $_POST['eaddress']);
    $etel = mysqli_real_escape_string($conn, $_POST['etel']);

    // คำสั่ง เพิ่มข้อมูล
    $sql = "INSERT INTO employee (ename, eaddress, etel) VALUES ('$ename', '$eaddress', '$etel')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('เพิ่มพนักงานสำเร็จ'); window.location.href='show_employee.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
} else {
    // ถ้าไม่ใช่ ให้เปลี่ยนไปยังหน้าเพิ่มพนักงาน
    header("Location: add_employee.php");
    exit();
}
?>

<?php
mysqli_close($conn);
?>
