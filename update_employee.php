<?php
include 'condb.php'; 

// ตรวจสอบการส่ง id 
if (isset($_POST['eid'])) {
    $eid = mysqli_real_escape_string($conn, $_POST['eid']);

    $ename = mysqli_real_escape_string($conn, $_POST['ename']);
    $eaddress = mysqli_real_escape_string($conn, $_POST['eaddress']);
    $etel = mysqli_real_escape_string($conn, $_POST['etel']);

    // คำสั่ง อัปเดตข้อมูล
    $sql = "UPDATE employee SET ename='$ename', eaddress='$eaddress', etel='$etel' WHERE eid='$eid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('แก้ไขข้อมูลพนักงานสำเร็จ'); window.location.href='show_employee.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ไม่พบรหัสพนักงาน'); window.location.href='show_employee.php';</script>";
}

mysqli_close($conn);
?>
