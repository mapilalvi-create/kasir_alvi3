@extends('adminlte::page')

@section('title', 'Data jenjang')

@section('content_header')
    <h1>Data jenjang</h1>
@stop

@section('content')
    <div class="card">
        {{-- Header dengan Style AdminLTE (Title di kiri, Tools di kanan) --}}
        <div class="card-header">
            <h3 class="card-title">Daftar jenjang</h3>
            <div class="card-tools">
                
                </a>
                <a href="{{ route('jenjang.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Siswa
                </a>
            </div>
        </div>
        
        {{-- Bagian Pencarian & Alert (Diberi padding agar rapi) --}}
        <div class="card-body pb-0">
            <form action="{{ route('jenjang.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama Siswa atau NIS" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Bagian Tabel (Style disamakan dengan Data Guru: p-0, table-hover, text-nowrap) --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>nama jenjang</th>
                        <th>keterangan</th> 
                        <th>aksi</th>   
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jenjangs as $key => $jenjang)
                    <tr>
                        <td>{{ $jenjangs->firstItem() + $key }}</td>
                        <td>{{ $jenjang->nama_jenjang }}</td>
                        <td>{{ $jenjang->keterangan }}</td>
                        <td>
                            {{-- Tombol Aksi disinkronkan stylenya (btn-sm, icon only) --}}
                            
                                <i class="fas fa-eye"></i>
                            </a>
                        
                                <i class="fas fa-edit"></i>
                            </a>
                            
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {!! $jenjangs->appends(request()->query())->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@stop