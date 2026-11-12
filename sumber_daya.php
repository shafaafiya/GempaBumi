<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumber Daya | SEISMO</title>
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
            <h1 class="section-title">Sumber Daya & Panduan</h1>
            <p class="section-subtitle">Pelajari langkah mitigasi, penyelamatan, dan evakuasi untuk mengurangi resiko ketika gempa terjadi.</p>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-6 col-lg-4">
                <div class="card resource-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-book-open"></i></div>
                        <h5>Panduan Mitigasi</h5>
                        <p>Pelajari cara mengidentifikasi risiko, menyiapkan rencana keluarga, serta menentukan titik aman di rumah dan lingkungan.</p>
                        <a class="btn btn-outline-primary btn-sm" href="https://www.bmkg.go.id" target="_blank">Baca Panduan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card resource-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-house"></i></div>
                        <h5>Sebelum Gempa</h5>
                        <p>Periksa bangunan, siapkan perlengkapan darurat, dan latihan komunikasi bila terjadi guncangan atau evakuasi.</p>
                        <a class="btn btn-outline-primary btn-sm" href="https://bnpb.go.id/" target="_blank">Lihat Sumber</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card resource-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-person-falling-burst"></i></div>
                        <h5>Saat Gempa</h5>
                        <p>Jauhi benda berat, lindungi kepala, dan segera mencari tempat yang aman dari reruntuhan bangunan.</p>
                        <a class="btn btn-outline-primary btn-sm" href="https://www.bmkg.go.id/gempabumi/" target="_blank">Panduan Aman</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card resource-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-truck-medical"></i></div>
                        <h5>Setelah Gempa</h5>
                        <p>Periksa luka, evakuasi jika diperlukan, dan patuhi arahan petugas serta pusat koordinasi kebencanaan.</p>
                        <a class="btn btn-outline-primary btn-sm" href="https://bnpb.go.id/" target="_blank">Informasi Terkini</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card resource-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-route"></i></div>
                        <h5>Evakuasi</h5>
                        <p>Kenali jalur evakuasi terdekat, titik kumpul, dan mekanisme komunikasi untuk menghindari kepanikan.</p>
                        <a class="btn btn-outline-primary btn-sm" href="https://bnpb.go.id/" target="_blank">Cek Jalur</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card resource-card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-video"></i></div>
                        <h5>Video Edukasi</h5>
                        <p>Video singkat tentang mitigasi gempa bumi dapat membantu penerapan langkah aman secara praktis.</p>
                        <a class="btn btn-outline-primary btn-sm" href="https://www.youtube.com/results?search_query=mitigasi+gempa+bumi" target="_blank">Tonton Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/seismo/assets/js/main.js"></script>
</body>
</html>
