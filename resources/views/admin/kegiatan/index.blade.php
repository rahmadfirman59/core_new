@extends('layouts.index')

@section('title')
    Summernote -
@endsection


@section('content')
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1"><span class="text-dark fw-bold fs-1">Kegiatan</span></h1>
                @include('layouts._breadcrumb')
            </div>
            <div class="d-flex align-items-center py-1 gap-6">
                <button type="button" onclick="info()" class="btn btn-flex btn-sm btn-primary fw-bold border-0 fs-6 h-40px">Tambah Kegiatan</button>
            </div>
        </div>

        <div class="w-100 mx-auto">
            <div class="card card-flush" id="card_data">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <form id="form_search">
                        <button type="submit" class="d-none">Search</button>
                        @csrf
                        <div class="card-title d-flex flex-lg-row align-items-center flex-column gap-6">
                            <div class="d-flex align-items-center position-relative my-1 gap-6">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>
                                <x-input name="judul" prefix="search_" caption="Search Slider" class="form-control-solid w-250px ps-12" />
                            </div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        </div>
                    </form>
                </div>
                <div class="card-body pt-0" id="table"></div>
            </div>
            <div id="card_info"></div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        let $form_search = $('#form_search'),
            $table = $('#table'),
            $card_data = $('#card_data'),
            $card_info = $('#card_info');
        let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ url('admin/kegiatan') }}';

        let init = () => {
            $card_info.html('');
            $card_data.show();
            search_data(selected_page);
        }

        let search_data = (page = 1) => {
            let data = get_form_data($form_search);
            data.paginate = 10;
            data.page = selected_page = get_selected_page(page, selected_page);
            $.post(base_url + '/search', data, (result) => $table.html(result)).fail((xhr) => $table.html(xhr.responseText));
        }

        let info = (id = '') => {
            $card_data.hide();
            $.get(base_url + '/' + (id === '' ? 'create' : (id + '/edit')), (result) => $card_info.html(result)).fail((xhr) => $card_info.html(xhr.responseText));
        }

        let confirm_delete = (id) => {
            Swal.fire(swal_delete_params).then((result) => {
                if (result.isConfirmed) $.post(base_url + '/' + id, {_method: 'delete', _token}, () => init()).fail((xhr) => $table.html(xhr.responseText));
            });
        }

        let init_form = (id = '') => {
            let $form_info = $('#form_info');
            $form_info.submit((e) => {
                e.preventDefault();
                let url = base_url;
                let data = new FormData($form_info.get(0));
                if (id !== '') url += '/' + id + '?_method=put';
                $.ajax({
                    url,
                    type: 'post',
                    data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: () => {
                        Swal.fire({
                            title: "Success!",
                            text: "Data berhasil ditambah/diubah",
                            icon: "success"
                        });
                        init()
                    },
                }).fail((xhr) => {
                    error_handle(xhr.responseText);
                    console.log(xhr.responseText);
                });
            });
        }

        $form_search.submit((e) => {
            e.preventDefault();
            search_data();
        });

        init_form_element();
        init();
    </script>
@endpush
