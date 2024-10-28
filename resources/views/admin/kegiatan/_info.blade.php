<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($kegiatan) ? 'Ubah' : 'Tambah' }} Produk</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <x-metronic-input name="judul" caption="Judul" :value="$kegiatan->judul ?? ''" />
                    <x-metronic-input name="tanggal" caption="Tanggal" :value="$kegiatan->harga ?? ''" type="date" />
                    <x-metronic-textarea name="konten" caption="konten" :value="$kegiatan->konten ?? ''" class="summernote" />

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
    init_form({{ $kegiatan->id ?? '' }});

    $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
    });


</script>
