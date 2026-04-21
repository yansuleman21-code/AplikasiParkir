@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>👥 Manajemen Pengguna</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <span>➕</span> Tambah User
    </a>
</div>

@if(session('success'))
    <div class="card" style="margin-bottom: 2rem; background: #ecfdf5; border-color: #10b981; color: #065f46; padding: 1rem; border-radius: 8px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="card" style="margin-bottom: 2rem; background: #fef2f2; border-color: #ef4444; color: #991b1b; padding: 1rem; border-radius: 8px;">
        {{ session('error') }}
    </div>
@endif

<div class="table-card">
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 80px;">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role == 'admin')
                        <span class="badge badge-blue">🛡 Admin</span>
                    @else
                        <span class="badge badge-green">👤 Petugas</span>
                    @endif
                </td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" style="background: #f59e0b;">
                            ✏ Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    🚫 Belum ada data pengguna
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
