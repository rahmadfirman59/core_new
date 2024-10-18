<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($slider) ? 'Ubah' : 'Tambah' }} Slider</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10">
                    <x-metronic-input name="judul" caption="Judul" :value="$slider->judul ?? ''" />
                    <x-metronic-input name="sub_judul" caption="Sub Judul" :value="$slider->sub_judul ?? ''" />
                    <x-metronic-textarea name="deskripsi" caption="Deskripsi" :value="$slider->deskripsi ?? ''" />
                </div>
                <div class="col-lg-2 text-center">
                    <div class="d-none">
                        <x-input type="file" name="file_gambar" />
                    </div>
                    <img src="{{ ($slider->gambar ?? '') !== '' ? asset('storage/' . $slider->gambar) : asset('images/default.jpg') }}" id="logo_preview" class="shadow-xs object-fit-cover rounded-2 h-200px w-100" />
                    <button class="btn btn-secondary btn-sm w-100 mt-3" type="button" onclick="open_file()">Cari Gambar</button>
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
    init_form({{ $slider->id ?? '' }});

    $kecamatan = $('#kecamatan');
    $kecamatan.change(() => {
        if ($kecamatan.val() !== '') $('#button_search_desa').removeClass('d-none');
    });

    open_file = () => $('#file_gambar').click();
    previewImage = (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => document.getElementById('logo_preview').src = e.target.result
            reader.readAsDataURL(file);
        }
    }
    document.getElementById('file_gambar').addEventListener('change', previewImage);
</script>
