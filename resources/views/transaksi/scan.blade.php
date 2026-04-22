@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>📷 Scan Tiket Parkir</h2>
    <p style="color: var(--text-muted);">Gunakan kamera untuk memindai QR Code pada tiket</p>
</div>

<div style="display: flex; flex-direction: column; align-items: center; gap: 2rem;">
    
    <div style="width: 100%; max-width: 500px; background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid var(--border-color); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
        <div id="reader" style="width: 100%; border-radius: 12px; overflow: hidden; border: none !important;"></div>
        
        <div id="result" style="margin-top: 1.5rem; text-align: center; display: none;">
            <div class="badge badge-green" style="padding: 10px 20px; font-size: 0.9rem;">
                ✅ Kode Berhasil Terbaca!
            </div>
            <p id="scanned-id" style="margin-top: 10px; font-weight: 700; font-size: 1.2rem; color: var(--accent);"></p>
            <p style="font-size: 0.8rem; color: var(--text-muted);">Mengalihkan ke halaman transaksi...</p>
        </div>
    </div>

    <div style="max-width: 500px; text-align: center; background: #eff6ff; padding: 1.5rem; border-radius: 12px; border: 1px solid #bfdbfe;">
        <h4 style="color: #1e40af; margin-bottom: 0.5rem;">Instruksi Scanning</h4>
        <ul style="text-align: left; font-size: 0.85rem; color: #1e3a8a; line-height: 1.6; margin-left: 1.2rem;">
            <li>Pastikan pencahayaan cukup terang.</li>
            <li>Posisikan QR Code tepat di dalam kotak scanner.</li>
            <li>Pastikan kamera tidak buram atau kotor.</li>
            <li>Jika menggunakan HP, izinkan akses kamera di browser.</li>
        </ul>
    </div>
</div>

{{-- Library Scanner --}}
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Hentikan scanner setelah berhasil
        html5QrcodeScanner.clear();
        
        // Tampilkan feedback visual
        document.getElementById('result').style.display = 'block';
        document.getElementById('scanned-id').innerText = decodedText;
        
        // Logika pengalihan
        // Format kita adalah PKR-{ID} atau PKR-{ID}-{NOPOL}
        // Kita ambil ID-nya saja
        let parts = decodedText.split('-');
        if (parts[0] === 'PKR') {
            let id = parts[1];
            
            // Redirect ke halaman detail transaksi setelah 1 detik
            setTimeout(() => {
                window.location.href = "/transaksi/" + id;
            }, 1000);
        } else {
            alert("Format QR Code tidak dikenali: " + decodedText);
            // Mulai ulang scanner jika salah format
            location.reload();
        }
    }

    function onScanFailure(error) {
        // Kita abaikan error kegagalan baca (masih mencari QR)
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", 
        { 
            fps: 10, 
            qrbox: {width: 250, height: 250},
            aspectRatio: 1.0
        },
        /* verbose= */ false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<style>
    /* Kostumisasi tampilan library scanner agar sesuai tema */
    #reader__scan_region {
        background: #f8fafc !important;
    }
    #reader__dashboard_section_csr button {
        background: var(--accent) !important;
        color: white !important;
        border: none !important;
        padding: 8px 16px !important;
        border-radius: 8px !important;
        font-family: 'Outfit', sans-serif !important;
        font-weight: 600 !important;
        cursor: pointer !important;
        margin-top: 10px !important;
    }
    #reader__dashboard_section_csr button:hover {
        background: var(--accent-hover) !important;
    }
    #reader video {
        border-radius: 12px !important;
    }
</style>

@endsection
