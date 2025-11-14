<?php
// BARU: Tambah session dan authentication check
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error_message'] = 'Please login first to access dashboard.';
    header("Location: login.php");
    exit;
}

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = (int)($_POST['id'] ?? 0);

    if ($action === 'update' && $id > 0) {
        $name   = trim($_POST['name'] ?? '');
        $phone  = trim($_POST['phone'] ?? '');
        $person = (int)($_POST['person'] ?? 0);
        $type   = $_POST['type'] ?? 'gel';
        $remove = $_POST['remove_option'] ?? 'No';
        $date   = $_POST['booking_date'] ?? '';
        $time   = $_POST['booking_time'] ?? '';
        $status = $_POST['status'] ?? 'pending';

        if (!in_array($type, ['gel','extension','pedicure'])) $type = 'gel';
        if (!in_array($remove, ['Yes','No'])) $remove = 'No';
        if (!in_array($status, ['pending','done'])) $status = 'pending';
        if ($person <= 0) $person = 1;

        $sql = "UPDATE bookings
                SET name=$1, phone=$2, person=$3, type=$4, remove_option=$5, booking_date=$6, booking_time=$7, status=$8
                WHERE id=$9";
        pg_query_params($conn, $sql, [$name,$phone,$person,$type,$remove,$date,$time,$status,$id]);
    }
    elseif ($action === 'delete' && $id > 0) {
        pg_query_params($conn, "DELETE FROM bookings WHERE id=$1", [$id]);
    }

    header("Location: dashboard.php");
    exit;
}

$editId = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;
$res = pg_query($conn, "SELECT * FROM bookings ORDER BY booking_date ASC, booking_time ASC, id DESC");
$rows = $res ? pg_fetch_all($res) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Booking Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root{
        --pink:#ff7aa2;
        --pink-dark:#e35c8e;
        --pink-50:#fff1f7;
        --border:#f3cddd;
    }
    body{font-family:Arial, sans-serif; margin:16px; background:#fff8fb; color:#333}
    h1{color:#d64b7f; margin-bottom:12px}
    table{width:100%; border-collapse:collapse; background:#fff; border:1px solid var(--border)}
    th,td{border-bottom:1px solid #f7d7e3; padding:8px; text-align:left; vertical-align:middle}
    th{background:#ffe3ef; color:#a43b66}
    
    /* UBAH: Input dan select ukuran kecil */
    input, select{
        padding:6px 10px; 
        border:1px solid #f1c5d6; 
        border-radius:8px;
        font-size: 0.875rem;  /* ✅ BARU: Font size lebih kecil */
    }
    
    /* BARU: Khusus untuk input di dalam table saat edit */
    td input, td select {
        font-size: 0.85rem;      /* ✅ Lebih kecil lagi */
        padding: 4px 8px;        /* ✅ Padding lebih kecil */
        max-width: 100%;         /* ✅ Tidak overflow */
    }
    
    /* BARU: Input number lebih kecil */
    td input[type="number"] {
        width: 70px;
    }
    
    /* BARU: Input date dan time kompak */
    td input[type="date"],
    td input[type="time"] {
        font-size: 0.8rem;
        padding: 3px 6px;
    }
    
    .empty{padding:10px; background:#fff; border:1px dashed #f1c5d6; border-radius:8px}
    .badge{padding:2px 10px; border-radius:999px; font-size:12px; border:1px solid #f1c5d6; background:#fff1f6; color:#d64b7f}
    .badge.done{background:#e7ffe9; color:#1b7d34; border-color:#bde3c6}

    .actions {
        display: flex;
        gap: 6px;
        align-items: center;
        flex-wrap: nowrap;
    }

    td.actions {
        white-space: nowrap;
        min-width: 220px;
    }

    /* Button compact */
    .btn {
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .btn-primary {
        background: var(--pink);
        color: #fff;
        border: 1px solid var(--pink);
    }

    .btn-outline {
        background: #fff;
        color: var(--pink);
        border: 1px solid var(--pink);
        padding: 5px 10px;
    }

    .btn-link {
        background: transparent;
        border: 0;
        color: var(--pink);
        padding: 5px 8px;
        font-size: 0.8rem;
    }
    
    .navbar-custom {
        background: #fff;
        border-bottom: 2px solid var(--border);
        padding: 15px 0;
        margin-bottom: 20px;
    }
    
    .navbar-custom .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .navbar-brand {
        color: var(--pink);
        font-weight: bold;
        font-size: 1.2rem;
        text-decoration: none;
    }
    
    .navbar-user {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .btn-logout {
        background: var(--pink);
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        border: none;
        cursor: pointer;
    }
    
    .btn-logout:hover {
        background: var(--pink-dark);
    }
</style>
</head>
<body>

<!-- BARU: Navbar dengan info user dan tombol logout -->
<div class="navbar-custom">
    <div class="container">
        <a href="#" class="navbar-brand">💅 Nailash Dashboard</a>
        <div class="navbar-user">
            <span>Welcome, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></span>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
    </div>
</div>

<div class="container">
<h1>Booking Dashboard</h1>

<?php if (!$rows): ?>
    <div class="empty">Belum ada data booking.</div>
<?php else: ?>
    <table>
    <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Person</th>
        <th>Type</th>
        <th>Remove</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $r): 
            $isEdit = ($editId === (int)$r['id']);
    ?>
        <tr>
        <?php if ($isEdit): ?>
            <form method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
            <td>#<?= htmlspecialchars($r['id']) ?></td>
            <td><input name="name" value="<?= htmlspecialchars($r['name']) ?>"></td>
            <td><input name="phone" value="<?= htmlspecialchars($r['phone']) ?>"></td>
            <td><input name="person" type="number" min="1" style="width:70px" value="<?= (int)$r['person'] ?>"></td>
            <td>
                <select name="type">
                <option value="gel" <?= $r['type']==='gel'?'selected':'' ?>>gel</option>
                <option value="extension" <?= $r['type']==='extension'?'selected':'' ?>>extension</option>
                <option value="pedicure" <?= $r['type']==='pedicure'?'selected':'' ?>>pedicure</option>
                </select>
            </td>
            <td>
                <select name="remove_option">
                <option value="Yes" <?= $r['remove_option']==='Yes'?'selected':'' ?>>Yes</option>
                <option value="No"  <?= $r['remove_option']==='No'?'selected':'' ?>>No</option>
                </select>
            </td>
            <td><input name="booking_date" type="date" value="<?= htmlspecialchars($r['booking_date']) ?>"></td>
            <td><input name="booking_time" type="time" value="<?= htmlspecialchars(substr($r['booking_time'],0,5)) ?>"></td>
            <td>
                <select name="status">
                <option value="pending" <?= $r['status']==='pending'?'selected':'' ?>>pending</option>
                <option value="done"    <?= $r['status']==='done'?'selected':'' ?>>done</option>
                </select>
            </td>
            <td class="actions">
                <button class="btn btn-primary" name="action" value="update">Save</button>
            </form>
                <form method="post" style="display:inline" onsubmit="return confirm('Hapus booking ini?')">
                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
                <button class="btn btn-outline" name="action" value="delete">Delete</button>
                </form>
                <a class="btn-link" href="dashboard.php">Cancel</a>
            </td>
        <?php else: ?>
            <td>#<?= htmlspecialchars($r['id']) ?></td>
            <td><?= htmlspecialchars($r['name']) ?></td>
            <td><?= htmlspecialchars($r['phone']) ?></td>
            <td><?= (int)$r['person'] ?></td>
            <td><?= htmlspecialchars($r['type']) ?></td>
            <td><?= htmlspecialchars($r['remove_option']) ?></td>
            <td><?= htmlspecialchars(date('d-m-Y', strtotime($r['booking_date']))) ?></td>
            <td><?= htmlspecialchars(date('H:i', strtotime($r['booking_time']))) ?></td>

            <td>
            <span class="badge <?= $r['status']==='done' ? 'done' : '' ?>">
                <?= htmlspecialchars($r['status']) ?>
            </span>
            </td>
            <td class="actions">
            <a class="btn btn-outline" href="dashboard.php?edit=<?= htmlspecialchars($r['id']) ?>">Edit</a>
            <form method="post" style="display:inline" onsubmit="return confirm('Hapus booking ini?')">
                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
                <button class="btn btn-outline" name="action" value="delete">Delete</button>
            </form>
            </td>
        <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<p style="margin-top:12px"><a class="btn-link" href="home.php">← Back to Home</a></p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>