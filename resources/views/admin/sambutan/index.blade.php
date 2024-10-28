@extends('layouts.index')

@section('title')
    Slider -
@endsection

@section('content')
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1"><span class="text-dark fw-bold fs-1">Sambutan</span></h1>
                @include('layouts._breadcrumb')
            </div>
{{--            <div class="d-flex align-items-center py-1 gap-6">--}}
{{--                <button type="button" onclick="info()" class="btn btn-flex btn-sm btn-primary fw-bold border-0 fs-6 h-40px">Tambah Slider</button>--}}
{{--            </div>--}}
        </div>

        <div class="w-100 mx-auto">
            <div id="card_info">
                <div class="card">
                    <form id="form_info">
                        @csrf
                        <div class="card-header">
                            <div class="card-title fs-3 fw-bold">{{ !empty($sambutan) ? 'Ubah' : 'Tambah' }} Sambutan</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <x-metronic-textarea name="konten"  caption="Sambutan" :value="$sambutan->konten ?? ''" /
                                    <x-metronic-textarea name="deskripsi" caption="Deskripsi" :value="$produk->deskripsi ?? ''" class="summernote" />
                                </div>

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let $form_search = $('#form_search'),
            $table = $('#table'),
            $card_data = $('#card_data'),
            $card_info = $('#card_info');
        let selected_page = 1, _token = '{{ csrf_token() }}', base_url = '{{ url('admin/slider') }}';

        let init = () => {
            $card_info.show();
            // $card_data.show();

        }

        let info = (id = '') => {
            $card_data.hide();
            $.get(base_url + '/' + (id === '' ? 'create' : (id + '/edit')), (result) => $card_info.html(result)).fail((xhr) => $card_info.html(xhr.responseText));
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
                            title: "Good job!",
                            text: "You clicked the button!",
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

    </script>
@endpush
