<?php
require_once __DIR__ . '/config/database.php';

$conn = getDbConnection();

$search = trim($_GET['search'] ?? '');
$filterDate = $_GET['tanggal'] ?? '';
$filterMagnitudo = $_GET['magnitudo'] ?? '';

$sql = "SELECT * FROM gempa_bumi WHERE 1=1";
$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND lokasi LIKE ?";
    $params[] = '%' . $search . '%';
    $types .= 's';
}

if ($filterDate !== '') {
    $sql .= " AND tanggal = ?";
    $params[] = $filterDate;
    $types .= 's';
}

if ($filterMagnitudo !== '') {
    $sql .= " AND magnitudo = ?";
    $params[] = $filterMagnitudo;
    $types .= 's';
}

$sql .= " ORDER BY tanggal DESC";

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$gempa = $result->fetch_all(MYSQLI_ASSOC);

$detail = null;
if (isset($_GET['id']) && $_GET['id'] !== '') {
    $id = (int)$_GET['id'];
    $detailStmt = $conn->prepare('SELECT * FROM gempa_bumi WHERE id_gempa = ?');
    $detailStmt->bind_param('i', $id);
    $detailStmt->execute();
    $detail = $detailStmt->get_result()->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gempa | SEISMO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/seismo/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/includes/navbar.php'; ?>

<section>
    <div class="container">
        <div class="text-center">
            <h1 class="section-title">Data Gempa</h1>
            <p class="section-subtitle">Riwayat kejadian gempa bumi di Indonesia dan dampaknya bagi masyarakat.</p>
        </div>

        <?php if ($detail): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Detail Kejadian</h4>
                        <a class="btn btn-outline-primary btn-sm" href="/seismo/data_gempa.php">Kembali</a>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Lokasi:</strong> <?= htmlspecialchars($detail['lokasi']) ?></div>
                        <div class="col-md-6"><strong>Tanggal:</strong> <?= htmlspecialchars($detail['tanggal']) ?></div>
                        <div class="col-md-6"><strong>Waktu:</strong> <?= htmlspecialchars($detail['waktu']) ?></div>
                        <div class="col-md-6"><strong>Magnitudo:</strong> M<?= number_format((float)$detail['magnitudo'], 1) ?></div>
                        <div class="col-md-6"><strong>Kedalaman:</strong> <?= (int)$detail['kedalaman'] ?> km</div>
                        <div class="col-md-6"><strong>Korban Jiwa:</strong> <?= (int)$detail['korban_jiwa'] ?></div>
                        <div class="col-md-6"><strong>Korban Luka-luka:</strong> <?= (int)$detail['korban_luka'] ?></div>
                        <div class="col-12"><strong>Kerusakan:</strong> <?= nl2br(htmlspecialchars($detail['kerusakan'] ?? '-')) ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Cari lokasi</label>
                        <input type="text" class="form-control" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Masukkan lokasi">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= htmlspecialchars($filterDate) ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Magnitudo</label>
                        <input type="number" step="0.1" min="0" class="form-control" name="magnitudo" value="<?= htmlspecialchars($filterMagnitudo) ?>" placeholder="Contoh 5.6">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (empty($gempa)): ?>
            <div class="empty-state">Belum ada data kejadian gempa yang sesuai dengan filter saat ini.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover data-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Magnitudo</th>
                            <th>Kedalaman</th>
                            <th>Korban Jiwa</th>
                            <th>Korban Luka</th>
                            <th>Kerusakan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gempa as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['tanggal']) ?></td>
                                <td><?= htmlspecialchars($item['waktu']) ?></td>
                                <td><?= htmlspecialchars($item['lokasi']) ?></td>
                                <td>M<?= number_format((float)$item['magnitudo'], 1) ?></td>
                                <td><?= (int)$item['kedalaman'] ?> km</td>
                                <td><?= (int)$item['korban_jiwa'] ?></td>
                                <td><?= (int)$item['korban_luka'] ?></td>
                                <td><?= htmlspecialchars(substr($item['kerusakan'] ?? '-', 0, 80)) ?><?= strlen($item['kerusakan'] ?? '-') > 80 ? '...' : '' ?></td>
                                <td>
                                    <a href="/seismo/data_gempa.php?id=<?= (int)$item['id_gempa'] ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/seismo/assets/js/main.js"></script>
</body>
</html>
