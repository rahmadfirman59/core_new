<div class="table-responsive">
    <table class="table ">
        <thead>
        <tr >
            <th class="w-10px ps-4 rounded-start">#</th>
            <th>Nama</th>
            <th>Email</th>
            <th >Opsi</th>
        </tr>
        </thead>
        <tbody class="fw-semibold text-gray-600">
        @php($no = 1)
        @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
            @php($no = (($users->currentPage()-1) * $users->perPage()) + 1)
        @endif
        @foreach($users as $user)
            <tr>
                <td class="ps-4">{{ $no++ }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a onclick="info({{ $user->id }})" href="javascript:void(0)" class="btn btn-sm nicebtn-blue-primary me-2 d-inline">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a onclick="confirm_delete({{ $user->id }})" class="btn btn-sm nicebtn-red-primary show_confirm">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex flex-row justify-content-center">
    @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $users->links('vendor.pagination.custom') }}
    @endif
</div>
