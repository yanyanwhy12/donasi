<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                              url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 15px;
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg mx-auto">
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold">Konfirmasi Donasi</h5>
                        <hr>
                        <p class="mb-1">Terima kasih, <strong>{{ $donation->nama_donatur }}</strong>!</p>
                        <p class="text-muted">Donasi ini dikumpulkan di Soto ayam bang kopjend untuk diberikan kepada korban bencana <strong>{{ $donation->bencana }}</strong></p>
                        <h3 class="fw-bold text-primary mb-4">Rp {{ number_format($donation->nominal, 0, ',', '.') }}</h3>
                        
                        <button class="btn btn-success w-100 fw-bold py-2 shadow-sm" id="pay-button">
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){ 
                    alert("Pembayaran Berhasil!"); 
                    window.location.href = '/'; 
                },
                onPending: function(result){ 
                    alert("Menunggu pembayaran..."); 
                },
                onError: function(result){ 
                    alert("Pembayaran Gagal!"); 
                }
            });
        });
    </script>
</body>
</html>