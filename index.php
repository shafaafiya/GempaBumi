<?php
require_once __DIR__ . '/config/database.php';

$conn = getDbConnection();

$gempaStats = $conn->query("SELECT COUNT(*) AS total_gempa, COALESCE(SUM(korban_jiwa), 0) AS total_jiwa, COALESCE(SUM(korban_luka), 0) AS total_luka FROM gempa_bumi")->fetch_assoc();
$orangHilangStats = $conn->query("SELECT COUNT(*) AS total_orang_hilang FROM orang_hilang WHERE status = 'Hilang'")->fetch_assoc();
$recentEvents = $conn->query("SELECT id_gempa, lokasi, tanggal, magnitudo, kedalaman FROM gempa_bumi ORDER BY tanggal DESC LIMIT 3")->fetch_all(MYSQLI_ASSOC);
$locationMap = [
    'Cianjur, Jawa Barat' => ['lat' => -6.821, 'lng' => 107.132],
    'Palu, Sulawesi Tengah' => ['lat' => -0.8917, 'lng' => 119.8708],
    'Bantul, DI Yogyakarta' => ['lat' => -7.8828, 'lng' => 110.3344],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEISMO | Sistem Informasi Gempa Bumi Indonesia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/seismo/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/includes/navbar.php'; ?>

<section class="hero">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-lg-7">
                <p class="text-uppercase mb-3 fw-semibold letter-spacing">Kesiapsiagaan Masyarakat</p>
                <h1>Kenali Gempa, Tingkatkan Kesiapsiagaan.</h1>
                <p>SEISMO menyajikan informasi gempa bumi, dampak, tindakan penyelamatan, dan data kejadian di Indonesia agar masyarakat siap menghadapi bencana dengan lebih bijak.</p>
                <div class="hero-actions">
                    <a class="btn btn-light" href="/seismo/informasi.php">Pelajari Lebih Lanjut</a>
                    <a class="btn btn-outline-light" href="/seismo/peta.php">Lihat Peta</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="accent-box">
                    <h4 class="mb-3">Ringkasan Data</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3"><strong><?= (int)($gempaStats['total_gempa'] ?? 0) ?></strong> kejadian gempa tercatat</li>
                        <li class="mb-3"><strong><?= (int)($gempaStats['total_jiwa'] ?? 0) ?></strong> korban jiwa</li>
                        <li class="mb-3"><strong><?= (int)($gempaStats['total_luka'] ?? 0) ?></strong> korban luka-luka</li>
                        <li><strong><?= (int)($orangHilangStats['total_orang_hilang'] ?? 0) ?></strong> orang hilang saat ini</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="hero-stats">
            <div class="stat-box">
                <strong><?= (int)($gempaStats['total_gempa'] ?? 0) ?></strong>
                <span>Kejadian Gempa</span>
            </div>
            <div class="stat-box">
                <strong><?= (int)($gempaStats['total_jiwa'] ?? 0) ?></strong>
                <span>Korban Jiwa</span>
            </div>
            <div class="stat-box">
                <strong><?= (int)($gempaStats['total_luka'] ?? 0) ?></strong>
                <span>Korban Luka</span>
            </div>
            <div class="stat-box">
                <strong><?= (int)($orangHilangStats['total_orang_hilang'] ?? 0) ?></strong>
                <span>Orang Hilang</span>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Mengenal Risiko Gempa Bumi</h2>
            <p class="section-subtitle">Gempa bumi dapat terjadi kapan saja. Pemahaman yang baik tentang penyebab, dampak, dan langkah penyelamatan dapat mencegah korban yang lebih besar.</p>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-mountain-sun"></i></div>
                        <h5>Definisi</h5>
                        <p>Gempa bumi adalah getaran permukaan bumi yang terjadi akibat pelepasan energi di dalam kerak bumi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-earthquake"></i></div>
                        <h5>Penyebab</h5>
                        <p>Pelepasan energi dari pergeseran lempeng tektonik, aktivitas vulkanik, dan sesar aktif menjadi penyebab utama.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                        <h5>Dampak</h5>
                        <p>Kerusakan rumah, infrastruktur, hingga likuefaksi dan tsunami dapat terjadi tergantung kekuatan dan kedalaman gempa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-shield-heart"></i></div>
                        <h5>Mitigasi</h5>
                        <p>Persiapan, evakuasi, dan kesadaran lingkungan menjadi kunci untuk menekan resiko dan korban.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="map-box" id="mapPreview"></div>
            </div>
            <div class="col-lg-5">
                <h2 class="section-title">Cuplikan Peta Persebaran Gempa</h2>
                <p>Data peta menampilkan lokasi kejadian utama berdasarkan contoh data yang tersedia. Koordinat tetap disesuaikan dengan sumber data resmi dan kebutuhan pemetaan.</p>
                <ul class="list-unstyled">
                    <?php foreach ($recentEvents as $event): ?>
                        <li class="mb-3">
                            <strong><?= htmlspecialchars($event['lokasi']) ?></strong><br>
                            <small><?= htmlspecialchars($event['tanggal']) ?> • M<?= number_format((float)$event['magnitudo'], 1) ?> • <?= (int)$event['kedalaman'] ?> km</small>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a class="btn btn-primary" href="/seismo/peta.php">Lihat Peta Lengkap</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Langkah Kesiapsiagaan</h2>
            <p class="section-subtitle">Ambil langkah yang tepat sebelum, saat, dan setelah gempa terjadi agar keluarga tetap aman.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>1. Sebelum Gempa</h5>
                        <p>Pastikan rumah aman, cek struktur bangunan, dan siapkan perlengkapan darurat seperti tas siaga, air, dan senter.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>2. Saat Gempa</h5>
                        <p>Jauhi benda berat, lindungi kepala, dan segera mencari tempat aman seperti bawah meja atau di sudut ruangan yang kokoh.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>3. Setelah Gempa</h5>
                        <p>Periksa kondisi lingkungan, hindari area berbahaya, dan ikuti arahan pihak berwenang serta penyelamatan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="/seismo/assets/js/main.js"></script>
<script>
    const mapPreview = L.map('mapPreview', { zoomControl: false }).setView([-2.5489, 118.0149], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(mapPreview);

    const previewPoints = <?= json_encode($locationMap, JSON_UNESCAPED_UNICODE) ?>;
    Object.entries(previewPoints).forEach(([location, coords]) => {
        L.marker([coords.lat, coords.lng]).addTo(mapPreview).bindPopup(location);
    });
</script>
</body>
</html>
