
<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($kategori) ? 'Ubah' : 'Tambah' }} Kategori</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <x-metronic-input name="nama_kategori" caption="Kategori" :value="$kategori->nama_kategori ?? ''" />
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
    init_form({{ $kategori->id ?? '' }});

    $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
    });


</script>
