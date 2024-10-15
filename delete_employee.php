<?php
include 'condb.php';

if (isset($_POST['eid'])) {

    $eid = mysqli_real_escape_string($conn, $_POST['eid']);

    // คำสั่ง ลบข้อมูล
    $sql = "DELETE FROM employee WHERE eid='$eid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('ลบพนักงานสำเร็จ'); window.location.href='show_employee.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
} else {
    // ถ้าไม่มีการส่งข้อมูล eid ให้ไปยังหน้าแสดงข้อมูล
    header("Location: show_employee.php");
    exit();
}
?>

<?php
mysqli_close($conn);
?>
