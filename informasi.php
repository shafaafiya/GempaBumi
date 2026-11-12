<?php require_once __DIR__ . '/config/database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Gempa Bumi | SEISMO</title>
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
            <h1 class="section-title">Informasi Gempa Bumi</h1>
            <p class="section-subtitle">Memahami gempa bumi adalah langkah awal dalam menjaga keselamatan keluarga dan lingkungan sekitar.</p>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-circle-info"></i></div>
                        <h5>1. Definisi Gempa Bumi</h5>
                        <p>Gempa bumi adalah getaran atau guncangan yang terjadi di permukaan bumi akibat pelepasan energi dari dalam kulit bumi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-layer-group"></i></div>
                        <h5>2. Penyebab Terjadinya</h5>
                        <p>Mayoritas gempa bumi dipicu oleh pergerakan lempeng tektonik, aktivitas sesar, atau erupsi gunung berapi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-arrows-up-down-left-right"></i></div>
                        <h5>3. Jenis Gempa</h5>
                        <p>Gempa tektonik, vulkanik, dan runtuhan memiliki karakteristik berbeda sesuai sumber penyebab serta wilayahnya.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-house-crack"></i></div>
                        <h5>4. Dampak</h5>
                        <p>Gempa dapat mengakibatkan retakan bangunan, robohnya rumah, longsor, hingga tsunami dan likuefaksi di area tertentu.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-ruler-combined"></i></div>
                        <h5>5. Skala Magnitudo</h5>
                        <p>Skala Richter menggambarkan energi gempa, sementara magnitudo yang lebih besar sering berdampak lebih luas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-water"></i></div>
                        <h5>6. Kedalaman Gempa</h5>
                        <p>Kedalaman gempa menentukan seberapa besar getaran dirasakan. Gempa dangkal cenderung lebih merusak daripada gempa dalam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-5">
                <img src="/seismo/assets/img/earthquake-1.svg" alt="Ilustrasi gempa bumi" class="img-fluid rounded-4 shadow-sm">
            </div>
            <div class="col-lg-7">
                <h3 class="section-title">Apa yang harus dilakukan saat gempa terjadi?</h3>
                <p>Jangan panik. Lindungi kepala, cari perlindungan yang kuat, dan hindari area yang mungkin runtuh. Setelah getaran berhenti, evaluasi keadaan dan segera lakukan evakuasi bila perlu.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Jauhi kaca, rak, dan benda berat yang bisa jatuh.</li>
                    <li class="list-group-item">Mencari tempat aman di bawah meja atau mengikuti jalur evakuasi.</li>
                    <li class="list-group-item">Keluarkan keluarga dari rumah saat kondisi aman untuk meminimalkan risiko.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/seismo/assets/js/main.js"></script>
</body>
</html>
