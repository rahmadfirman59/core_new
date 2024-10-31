<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($pengurus) ? 'Ubah' : 'Tambah' }} Pengurus</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10">
                    <x-metronic-input name="nama" caption="Nama" :value="$pengurus->nama ?? ''" />
                    <x-metronic-input name="jabatan" caption="Jabatan" :value="$pengurus->jabatan ?? ''" />
                    <x-metronic-input name="email" caption="Email" :value="$pengurus->email ?? ''" />
                    <x-metronic-input name="facebook" caption="Facebook" :value="$pengurus->facebook ?? ''" />
                    <x-metronic-input name="instagram" caption="Instagram" :value="$pengurus->instagram ?? ''" />
                    <x-metronic-input name="twitter" caption="Twitter" :value="$pengurus->twitter ?? ''" />

                </div>
                <div class="col-lg-2 text-center">
                    <div class="d-none">
                        <x-input type="file" name="file_gambar" />
                    </div>
                    <img src="{{ ($pengurus->foto ?? '') !== '' ? asset('storage/' . $pengurus->foto) : asset('images/default.jpg') }}" id="logo_preview" class="shadow-xs object-fit-cover rounded-2 h-200px w-100" />
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
    init_form({{ $pengurus->id ?? '' }});

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
