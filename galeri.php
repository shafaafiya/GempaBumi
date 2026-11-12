<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri | SEISMO</title>
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
            <h1 class="section-title">Galeri Gempa Bumi</h1>
            <p class="section-subtitle">Dokumentasi dan ilustrasi terkait dampak bencana, proses evakuasi, serta upaya kesiapsiagaan dan penanggulangan.</p>
        </div>

        <div class="gallery-grid mt-4">
            <div class="gallery-item">
                <img src="/seismo/assets/img/earthquake-1.svg" alt="Gempa bumi dan bangunan">
                <div class="caption">Perubahan kondisi bangunan setelah gempa</div>
            </div>
            <div class="gallery-item">
                <img src="/seismo/assets/img/earthquake-2.svg" alt="Bangunan rusak">
                <div class="caption">Evaluasi struktur rumah dan infrastruktur</div>
            </div>
            <div class="gallery-item">
                <img src="/seismo/assets/img/earthquake-3.svg" alt="Evakuasi pasca gempa">
                <div class="caption">Proses evakuasi dan koordinasi penanggulangan</div>
            </div>
            <div class="gallery-item">
                <img src="/seismo/assets/img/earthquake-4.svg" alt="Mitigasi dan kesiapsiagaan">
                <div class="caption">Kegiatan mitigasi dan edukasi masyarakat</div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/seismo/assets/js/main.js"></script>
</body>
</html>
