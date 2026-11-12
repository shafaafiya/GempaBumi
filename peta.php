<?php
require_once __DIR__ . '/config/database.php';

$conn = getDbConnection();
$query = "SELECT id_gempa, tanggal, waktu, lokasi, magnitudo, kedalaman FROM gempa_bumi ORDER BY tanggal DESC";
$result = $conn->query($query);
$gempa = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
$referenceCoords = [
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
    <title>Peta Gempa | SEISMO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/seismo/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/includes/navbar.php'; ?>

<section>
    <div class="container">
        <div class="text-center">
            <h1 class="section-title">Peta Persebaran Gempa</h1>
            <p class="section-subtitle">Persebaran kejadian gempa di Indonesia berdasarkan data yang tersedia. Karena tabel tidak memiliki kolom koordinat, tampilan peta menggunakan referensi lokasi yang telah divalidasi secara umum untuk visualisasi.</p>
        </div>

        <div class="card p-3">
            <div id="map" class="map-box"></div>
            <div class="map-legend">
                <span class="legend-item"><span class="legend-swatch" style="background: #28a745"></span> Rendah (< 5.0)</span>
                <span class="legend-item"><span class="legend-swatch" style="background: #ffc107"></span> Sedang (5.0 - 6.9)</span>
                <span class="legend-item"><span class="legend-swatch" style="background: #dc3545"></span> Tinggi (≥ 7.0)</span>
            </div>
        </div>

        <div class="mt-4">
            <?php if (empty($gempa)): ?>
                <div class="empty-state">Belum ada data gempa yang tersedia pada sistem.</div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($gempa as $item): ?>
                        <div class="col-md-6 col-xl-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="mb-0"><?= htmlspecialchars($item['lokasi']) ?></h5>
                                        <span class="badge bg-danger">M<?= number_format((float)$item['magnitudo'], 1) ?></span>
                                    </div>
                                    <p class="mb-1"><strong>Tanggal:</strong> <?= htmlspecialchars($item['tanggal']) ?></p>
                                    <p class="mb-1"><strong>Waktu:</strong> <?= htmlspecialchars($item['waktu']) ?></p>
                                    <p class="mb-1"><strong>Kedalaman:</strong> <?= (int)$item['kedalaman'] ?> km</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script src="/seismo/assets/js/main.js"></script>
<script>
    const map = L.map('map').setView([-2.5489, 118.0149], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const events = <?= json_encode($gempa, JSON_UNESCAPED_UNICODE) ?>;
    const reference = <?= json_encode($referenceCoords, JSON_UNESCAPED_UNICODE) ?>;

    events.forEach((event) => {
        const coord = reference[event.lokasi] || { lat: -2.5489, lng: 118.0149 };
        const color = event.magnitudo >= 7 ? '#dc3545' : (event.magnitudo >= 5 ? '#ffc107' : '#28a745');
        const marker = L.circleMarker([coord.lat, coord.lng], {
            radius: 8,
            color: color,
            fillColor: color,
            fillOpacity: 0.8,
            weight: 2
        }).addTo(map);

        marker.bindPopup(`
            <strong>${event.lokasi}</strong><br>
            Tanggal: ${event.tanggal}<br>
            Waktu: ${event.waktu}<br>
            Magnitudo: M${Number(event.magnitudo).toFixed(1)}<br>
            Kedalaman: ${event.kedalaman} km
        `);
    });
</script>
</body>
</html>
