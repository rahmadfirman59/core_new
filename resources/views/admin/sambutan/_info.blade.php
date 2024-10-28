@extends('layouts.index')

@section('title')
    Sambutan -
@endsection

@section('content')
    <div class="card">
        <form id="form_info">
            @csrf
            <div class="card-header">
                <div class="card-title fs-3 fw-bold">{{ !empty($sambutan) ? 'Ubah' : 'Tambah' }} Sambutan</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <x-metronic-textarea name="konten"  caption="Sambutan" :value="$sambutan->konten ?? ''" />

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
        $('.summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });


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

        // init_form_element();
        init_form({{ $sambutan->id ?? '' }});

    </script>
@endpush
