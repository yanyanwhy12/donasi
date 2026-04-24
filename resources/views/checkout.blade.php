<!DOCTYPE html>
<html>
<head>
    <title>Selesaikan Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" 
        src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
</script>
</head>
<body class="bg-light">
    <div class="container mt-5 text-center">
        <div class="card shadow mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h5>Konfirmasi Donasi</h5>
                <hr>
                <p>Terima kasih, <strong>{{ $donation->nama_donatur }}</strong>!</p>
                <p>Donasi untuk: {{ $donation->bencana }}</p>
                <h4>Rp {{ number_format($donation->nominal, 0, ',', '.') }}</h4>
                <button class="btn btn-success mt-3" id="pay-button">Bayar Sekarang</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){ alert("Pembayaran Berhasil!"); window.location.href = '/'; },
                onPending: function(result){ alert("Menunggu pembayaran..."); },
                onError: function(result){ alert("Pembayaran Gagal!"); }
            });
        });
    </script>
</body>
</html>