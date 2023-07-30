@foreach ($pengguna as $p)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->wa }}</td>
        <td>{{ $p->role }}</td>
        <td class="option">
            <div class="btn-group dropleft btn-option">
                <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </i>
                <div class="dropdown-menu">
                    {{-- <a data-pengguna='@json($p)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                    <a data-pengguna='@json($p)' data-toggle="modal" data-target="#modalPengguna"
                        class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                    <a data-id_pengguna="{{ $p->id }}" class="dropdown-item hapus" href="#"><i
                            class="fas fa-trash"> Hapus</i></a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
<tr class="no-hover">
    <td colspan="5" class="text-center">
        <br>
        {!! $pengguna->links('pagination::bootstrap-4') !!}
    </td>
</tr>
{{-- Halaman : {{ $pengguna->currentPage() }} <br /> --}}
{{-- <div class="d-flex justify-content-between ml-4 mr-3">
    <p>Menampilkan : {{ $pengguna->count() }} / {{ $pengguna->total() }} data pengguna</p>
{{ $pengguna->links('pagination::bootstrap-4') }}
</div> --}}
