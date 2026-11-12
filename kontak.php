<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | SEISMO</title>
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
            <h1 class="section-title">Kontak & Informasi Darurat</h1>
            <p class="section-subtitle">Hubungi sumber resmi jika Anda membutuhkan informasi lebih lanjut atau lapor kondisi darurat.</p>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-building-columns"></i></div>
                        <h5>BMKG</h5>
                        <p><strong>Website:</strong> bmkg.go.id</p>
                        <p><strong>Telepon:</strong> +62 21 2981 2345</p>
                        <p><strong>Lokasi:</strong> Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-people-roof"></i></div>
                        <h5>BNPB</h5>
                        <p><strong>Website:</strong> bnpb.go.id</p>
                        <p><strong>Telepon:</strong> +62 21 2981 5050</p>
                        <p><strong>Lokasi:</strong> Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="feature-icon"><i class="fa-solid fa-phone-volume"></i></div>
                        <h5>Layanan Darurat</h5>
                        <p><strong>Call:</strong> 112</p>
                        <p><strong>Ambulan:</strong> 118</p>
                        <p><strong>Penanggulangan Bencana:</strong> 119</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h4 class="mb-3">Formulir Pertanyaan</h4>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Anda">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email Anda">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subjek</label>
                            <input type="text" class="form-control" placeholder="Subjek pesan">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pesan</label>
                            <textarea class="form-control" rows="5" placeholder="Tuliskan pertanyaan atau kebutuhan informasi Anda..."></textarea>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/seismo/assets/js/main.js"></script>
</body>
</html>
