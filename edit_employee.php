<?php
include 'condb.php'; 

// ตรวจสอบ id 
if (isset($_GET['id'])) {
    $eid = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM employee WHERE eid='$eid'";
    $result = mysqli_query($conn, $sql);
    $employee = mysqli_fetch_assoc($result);
    
    if (!$employee) {
        echo "<script>alert('ไม่พบข้อมูลพนักงาน'); window.location.href='show_employee.php';</script>";
        exit();
    }
} else {
    // ถ้าไม่มีการส่ง id ให้ไปยังหน้าแสดงข้อมูล
    echo "<script>alert('ไม่พบรหัสพนักงาน'); window.location.href='show_employee.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>แก้ไขข้อมูลพนักงาน</h1>
        <form method="POST" action="update_employee.php"> 
            <input type="hidden" name="eid" value="<?= htmlspecialchars($employee['eid']) ?>"> 
            <div class="mb-3">
                <label for="ename" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="ename" name="ename" value="<?= htmlspecialchars($employee['ename']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="eaddress" class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" id="eaddress" name="eaddress" value="<?= htmlspecialchars($employee['eaddress']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="etel" class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" id="etel" name="etel" value="<?= htmlspecialchars($employee['etel']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
            <a href="show_employee.php" class="btn btn-secondary">กลับ</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
