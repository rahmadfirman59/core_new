<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 table-sm">
        <thead>
        <tr class="text-start bg-light text-black-400 fw-bold fs-7 text-uppercase">
            <th class="w-10px ps-4 rounded-start">#</th>
            <th>Konten</th>
            <th class="text-center w-50px pe-4 rounded-end">Opsi</th>
        </tr>
        </thead>
        <tbody class="fw-semibold text-gray-600">
        @php($no = 1)
        @if($sambutan instanceof \Illuminate\Pagination\LengthAwarePaginator)
            @php($no = (($sambutan->currentPage()-1) * $sambutan->perPage()) + 1)
        @endif
        @foreach($sambutan as $s)
            <tr>
                <td class="ps-4">{{ $no++ }}</td>
                <td>{{ $s->konten }}</td>

                <td class="text-end text-nowrap">
                    <button class="btn btn-sm btn-secondary ps-7" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opsi <i class="ki-duotone ki-down fs-5 ms-1"></i>
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown dropdown-menu menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3"><a onclick="info({{ $s->id }})" href="javascript:void(0)" class="menu-link px-3">Ubah</a></div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex flex-row justify-content-center">
    @if($sambutan instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{ $sambutan->links('vendor.pagination.custom') }}
    @endif
</div>
