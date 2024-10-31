<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($umkm) ? 'Ubah' : 'Tambah' }} UMKM</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <x-metronic-input name="nama" caption="Nama" :value="$umkm->nama ?? ''" />
                    <x-metronic-input name="pemilik" caption="Pemilik" :value="$umkm->pemilik ?? ''" />
                    <x-metronic-input name="telepon" caption="Telepon" :value="$umkm->telepon ?? ''" />
                    <x-metronic-select name="jenis_usaha" caption="Jenis Usaha" :options="$jenis_usaha" :value="$umkm->jenis_usaha ?? ''" />
                    <x-metronic-input type="date" name="tanggal_pendirian" caption="Tanggal Pendirian" :value="$umkm->tanggal_pendirian ?? ''" />
                    <x-metronic-textarea name="alamat" caption="Alamat" :value="$umkm->alamat ?? ''" />
                    <x-metronic-textarea name="deskripsi" caption="Deskripsi" :value="$umkm->deskripsi ?? ''" class="summernote" />
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
    init_form({{ $umkm->id ?? '' }});

    $kecamatan = $('#kecamatan');
    $kecamatan.change(() => {
        if ($kecamatan.val() !== '') $('#button_search_desa').removeClass('d-none');
    });


    $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
    });
</script>
