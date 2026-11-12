<?php
require_once __DIR__ . '/config/database.php';

$conn = getDbConnection();
$search = trim($_GET['search'] ?? '');
$status = $_GET['status'] ?? '';

$sql = "SELECT oh.*, gb.lokasi AS lokasi_gempa FROM orang_hilang oh JOIN gempa_bumi gb ON oh.id_gempa = gb.id_gempa WHERE 1=1";
$params = [];
$types = '';

if ($search !== '') {
    $sql .= " AND oh.nama LIKE ?";
    $params[] = '%' . $search . '%';
    $types .= 's';
}

if ($status !== '') {
    $sql .= " AND oh.status = ?";
    $params[] = $status;
    $types .= 's';
}

$sql .= " ORDER BY gb.tanggal DESC, oh.nama ASC";

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$orangHilang = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Orang Hilang | SEISMO</title>
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
            <h1 class="section-title">Data Orang Hilang</h1>
            <p class="section-subtitle">Informasi pencarian dan status orang hilang akibat kejadian gempa bumi.</p>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label">Cari nama</label>
                        <input type="text" class="form-control" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Masukkan nama">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="">Semua status</option>
                            <option value="Hilang" <?= $status === 'Hilang' ? 'selected' : '' ?>>Hilang</option>
                            <option value="Ditemukan" <?= $status === 'Ditemukan' ? 'selected' : '' ?>>Ditemukan</option>
                            <option value="Meninggal" <?= $status === 'Meninggal' ? 'selected' : '' ?>>Meninggal</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (empty($orangHilang)): ?>
            <div class="empty-state">Belum ada data orang hilang yang sesuai dengan pencarian saat ini.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover data-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Ciri-ciri</th>
                            <th>Lokasi Terakhir</th>
                            <th>Status</th>
                            <th>Lokasi Ditemukan</th>
                            <th>Kejadian Gempa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orangHilang as $item): ?>
                            <?php
                                $statusClass = 'badge-hilang';
                                if ($item['status'] === 'Ditemukan') {
                                    $statusClass = 'badge-ditemukan';
                                } elseif ($item['status'] === 'Meninggal') {
                                    $statusClass = 'badge-meninggal';
                                }
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($item['nama']) ?></td>
                                <td><?= htmlspecialchars((string)($item['umur'] ?? '-')) ?></td>
                                <td><?= htmlspecialchars($item['jenis_kelamin']) ?></td>
                                <td><?= htmlspecialchars($item['ciri_ciri'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($item['lokasi_terakhir'] ?? '-') ?></td>
                                <td><span class="badge-status <?= $statusClass ?>"><?= htmlspecialchars($item['status']) ?></span></td>
                                <td><?= htmlspecialchars($item['lokasi_ditemukan'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($item['lokasi_gempa']) ?></td>
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
