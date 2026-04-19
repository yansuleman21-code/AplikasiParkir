@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">🚗 Data Kendaraan</h3>

        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary shadow-sm">
            ➕ Tambah Kendaraan
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm" id="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">

                    <thead style="background: #212529; color: white;">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>Warna</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $k)
                        <tr>

                            <td class="fw-semibold text-muted">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <span class="badge bg-dark px-3 py-2">
                                    {{ $k->no_polisi }}
                                </span>
                            </td>

                            <td>
                                @if($k->jenis == 'motor')
                                    <span class="badge bg-success px-3 py-2">🏍 Motor</span>
                                @else
                                    <span class="badge bg-primary px-3 py-2">🚗 Mobil</span>
                                @endif
                            </td>

                            <td>
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    {{ $k->warna }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('kendaraan.edit', $k->id) }}"
                                       class="btn btn-sm btn-warning px-3">
                                        ✏ Edit
                                    </a>

                                    <form action="{{ route('kendaraan.destroy', $k->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger px-3"
                                                onclick="return confirm('Yakin hapus?')">
                                            🗑 Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-muted">
                                🚫 Belum ada data kendaraan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

{{-- Auto hide alert --}}
<script>
setTimeout(() => {
    let alert = document.getElementById('alert');
    if(alert){
        alert.style.transition = "0.5s";
        alert.style.opacity = "0";
        setTimeout(() => alert.remove(), 500);
    }
}, 3000);
</script>

@endsection