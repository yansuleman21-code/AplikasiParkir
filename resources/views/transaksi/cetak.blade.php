<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Parkir #{{ $data->id }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f1f5f9;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .ticket {
            width: 350px;
            background: white;
            padding: 2rem;
            border-radius: 0;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            border: 1px dashed #cbd5e1;
        }

        .header {
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #1e293b;
            padding-bottom: 1rem;
        }

        .header h1 {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: #1e293b;
        }

        .header p {
            font-size: 0.7rem;
            color: #64748b;
            margin-top: 4px;
        }

        .info-section {
            margin: 1.5rem 0;
            text-align: left;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
        }

        .info-label {
            color: #64748b;
            font-weight: 500;
        }

        .info-value {
            color: #1e293b;
            font-weight: 700;
        }

        .barcode-container {
            margin: 2rem 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .qr-wrapper {
            padding: 10px;
            border: 1px solid #e2e8f0;
            background: white;
        }

        .footer {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px dashed #cbd5e1;
            font-size: 0.7rem;
            color: #64748b;
            line-height: 1.4;
        }

        .no-print {
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .btn-print {
            background: #3b82f6;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }

        @media print {
            body { background: white; padding: 0; }
            .ticket { box-shadow: none; border: none; width: 100%; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <button onclick="window.print()" class="btn-print">🖨️ Cetak Sekarang</button>
        <a href="{{ route('transaksi.show', $data->id) }}" style="margin-left: 10px; color: #64748b; text-decoration: none; font-size: 0.8rem;">Kembali</a>
    </div>

    <div class="ticket">
        <div class="header">
            <h1>PARKIR.PRO</h1>
            <p>Sistem Manajemen Parkir Modern</p>
            <p>{{ $data->areaParkir->nama_area }}</p>
        </div>

        <div class="info-section">
            <div class="info-row">
                <span class="info-label">ID Tiket</span>
                <span class="info-value">#{{ $data->id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">No Polisi</span>
                <span class="info-value">{{ $data->kendaraan->no_polisi }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Jenis</span>
                <span class="info-value">{{ ucfirst($data->kendaraan->jenis) }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Masuk</span>
                <span class="info-value">{{ \Carbon\Carbon::parse($data->waktu_masuk)->format('d/m/Y H:i') }}</span>
            </div>
        </div>

        <div class="barcode-container">
            <div class="qr-wrapper">
                <div id="qrcode"></div>
            </div>
            <svg id="barcode"></svg>
        </div>

        <div class="footer">
            <p>Simpan tiket ini untuk verifikasi saat keluar.</p>
            <p>Terima kasih atas kunjungan Anda.</p>
            <p style="margin-top: 10px; font-weight: 700;">www.parkirpro.online</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"></script>
    <script>
        // Generate QR Code
        new QRCode(document.getElementById("qrcode"), {
            text: "PKR-{{ $data->id }}",
            width: 120,
            height: 120,
            colorDark : "#1e293b",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        // Generate Barcode
        JsBarcode("#barcode", "{{ $data->kendaraan->no_polisi }}", {
            format: "CODE128",
            width: 1.5,
            height: 40,
            displayValue: true,
            fontSize: 12,
            margin: 0
        });

        // Auto print
        window.onload = function() {
            setTimeout(() => {
                // window.print();
            }, 500);
        }
    </script>
</body>
</html>
