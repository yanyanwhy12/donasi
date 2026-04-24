<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi Bencana Alam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Ganti URL di bawah dengan link foto background yang kamu mau */
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                              url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100 vh; /* Full tinggi layar */
            margin: 0;
            display: flex;
            align-items: center; /* Tengah vertikal */
            justify-content: center; /* Tengah horizontal */
        }

        .card {
            border-radius: 15px;
            backdrop-filter: blur(5px); /* Efek blur di belakang kotak */
            background-color: rgba(255, 255, 255, 0.9); /* Kotak agak transparan */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5"> <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">🙏 Donasi Peduli Bencana</h3>
                        <form action="/donasi" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Target Bencana</label>
                                <select name="bencana" class="form-select" required>
                                    <option value="Gempa Bumi">Gempa Bumi</option>
                                    <option value="Banjir Bandang">Banjir Bandang</option>
                                    <option value="Erupsi Gunung">Erupsi Gunung</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Anda</label>
                                <input type="text" name="nama_donatur" class="form-control" placeholder="wajib di isi" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nominal Donasi (Rp)</label>
                                <input type="number" name="nominal" class="form-control" placeholder="Min. 10000" min="10000" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">Kirim Donasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>