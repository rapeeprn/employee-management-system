<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>ข้อมูลพนักงาน</h1>
        <!-- ปุ่มเพิ่มข้อมูล -->
        <a href="add_employee.php" class="btn btn-primary mb-3">เพิ่มพนักงาน</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทร</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM employee"; 
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['eid']) ?></td>
                            <td><?= htmlspecialchars($row['ename']) ?></td>
                            <td><?= htmlspecialchars($row['eaddress']) ?></td>
                            <td><?= htmlspecialchars($row['etel']) ?></td>
                            <td>
                                <!-- ปุ่มแก้ไข -->
                                <a href="edit_employee.php?id=<?= $row['eid'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                <!-- ปุ่มลบ -->
                                <form action="delete_employee.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="eid" value="<?= $row['eid'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลนี้?');">ลบ</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">ไม่พบข้อมูลพนักงาน</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>