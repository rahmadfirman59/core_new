@extends('layouts.index')

@section('title')
    Sejarah -
@endsection

@section('content')
    <div class="card">
        <form id="form_info">
            @csrf
            <div class="card-header">
                <div class="card-title fs-3 fw-bold">{{ !empty($sejarah) ? 'Ubah' : 'Tambah' }} Sejarah</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <x-metronic-textarea name="konten"  caption="Sejarah" :value="$sejarah->konten ?? ''" />
                    </div>

                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')

    <script>


        let $form_search = $('#form_search'),
            $table = $('#table'),
            $card_data = $('#card_data'),
            $card_info = $('#card_info');
        let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ url('admin/profil/sejarah') }}';

        let init = () => {
            $card_info.html('');
            $card_data.show();
            // search_data(selected_page);
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
                    success: () =>{
                        Swal.fire({
                            title: "Success",
                            text: "Data berasil diubah ",
                            icon: "success"
                        });
                        setTimeout(function(){window.location.reload()}, 2000);

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
        init_form({{ $sejarah->id ?? '' }});

    </script>
@endpush
