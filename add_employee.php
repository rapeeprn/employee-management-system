<?php
include 'condb.php'; 
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>เพิ่มพนักงาน</h1>
        <form method="POST" action="insert_employee.php">
            <div class="mb-3">
                <label for="ename" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="ename" name="ename" required>
            </div>
            <div class="mb-3">
                <label for="eaddress" class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" id="eaddress" name="eaddress" required>
            </div>
            <div class="mb-3">
                <label for="etel" class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" id="etel" name="etel" required>
            </div>
            <button type="submit" class="btn btn-primary">เพิ่มพนักงาน</button>
            <a href="show_employee.php" class="btn btn-secondary">กลับ</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>