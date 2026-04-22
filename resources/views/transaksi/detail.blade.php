@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>👁 Detail Transaksi Parkir</h2>
    <a href="{{ route('transaksi.index') }}" class="btn btn-sm" style="color: var(--text-muted);">← Kembali</a>
</div>

<div class="form-card" style="max-width: 800px;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <div>
            <h4 style="margin-bottom: 1rem; color: var(--text-muted); font-size: 0.8rem; text-transform: uppercase;">Informasi Kendaraan</h4>
            <p><strong>No Polisi:</strong> <span class="badge badge-blue">{{ $data->kendaraan->no_polisi }}</span></p>
            <p><strong>Jenis:</strong> {{ ucfirst($data->kendaraan->jenis) }}</p>
            <p><strong>Warna:</strong> {{ $data->kendaraan->warna }}</p>
        </div>
        
        <div>
            <h4 style="margin-bottom: 1rem; color: var(--text-muted); font-size: 0.8rem; text-transform: uppercase;">Informasi Area & Tarif</h4>
            <p><strong>Area Parkir:</strong> {{ $data->areaParkir->nama_area }}</p>
            <p><strong>Tarif Dasar:</strong> Rp {{ number_format($data->tarif->tarif_per_jam ?? 0) }}/jam</p>
        </div>
    </div>

    <hr style="margin: 2rem 0; border: 0; border-top: 1px solid var(--border-color);">

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <div>
            <h4 style="margin-bottom: 1rem; color: var(--text-muted); font-size: 0.8rem; text-transform: uppercase;">Waktu</h4>
            <p><strong>Waktu Masuk:</strong> {{ \Carbon\Carbon::parse($data->waktu_masuk)->format('d M Y H:i:s') }}</p>
            <p><strong>Waktu Keluar:</strong> {{ $data->waktu_keluar ? \Carbon\Carbon::parse($data->waktu_keluar)->format('d M Y H:i:s') : 'Masih Parkir' }}</p>
            <p><strong>Durasi:</strong> {{ $data->durasi ?? '-' }} Jam</p>
        </div>

        <div style="background: #f8fafc; padding: 1.5rem; border-radius: 12px; text-align: center;">
            <h4 style="margin-bottom: 0.5rem; color: var(--text-muted); font-size: 0.8rem; text-transform: uppercase;">Total Biaya</h4>
            <div style="font-size: 2rem; font-weight: 800; color: var(--accent);">
                Rp {{ number_format($data->biaya ?? 0, 0, ',', '.') }}
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem; align-items: center;">
        <div style="background: white; padding: 1rem; border: 1px solid var(--border-color); border-radius: 12px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <div id="qrcode"></div>
            <p style="margin-top: 0.5rem; font-size: 0.7rem; color: var(--text-muted);">QR Code Tiket #{{ $data->id }}</p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <a href="{{ route('transaksi.cetak', $data->id) }}" target="_blank" class="btn btn-primary" style="width: 100%; padding: 1rem;">
                🖨️ Cetak Tiket Parkir
            </a>
            
            @if(!$data->waktu_keluar)
            <form method="POST" action="{{ route('transaksi.update', $data->id) }}" style="width: 100%;">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success" style="width: 100%; padding: 1rem;">
                    🚪 Selesaikan Parkir (Check Out)
                </button>
            </form>
            @endif
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    new QRCode(document.getElementById("qrcode"), {
        text: "PKR-{{ $data->id }}-{{ $data->kendaraan->no_polisi }}",
        width: 128,
        height: 128,
        colorDark : "#1e293b",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>

@endsection