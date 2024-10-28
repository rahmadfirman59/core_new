<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($sambutan) ? 'Ubah' : 'Tambah' }} Sambutan</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <x-metronic-textarea name="konten" caption="konten" :value="$sambutan->konten ?? ''" class="summernote" />
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="button" onclick="init()" class="btn btn-light btn-active-light-primary me-2">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
    init_form_element();
    init_form({{ $sambutan->id ?? '' }});

    $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
    });


</script>
