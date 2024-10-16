<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($user) ? 'Ubah' : 'Tambah' }} User</div>
        </div>
        <div class="card-body">
            <x-metronic-input name="nama" caption="Nama" :value="$user->nama ?? ''" />
            <x-metronic-input name="email" caption="Email" :value="$user->email ?? ''" />
            <x-metronic-input name="password" caption="Password" type="password" />
            <x-metronic-input name="password_confirmation" caption="Ulangi Password" type="password" />
            <x-metronic-select name="akses" caption="Akses" :options="$list_akses" :value="$user->akses ?? ''" />
            <div class="row mb-6" id="form_group_kecamatan">
                <label class="col-lg-3 col-form-label fw-bold fs-6">Kecamatan</label>
                <div class="col-lg-9 position-relative d-flex flex-row align-items-center">
                    <x-input name="kecamatan" class="form-control-solid" :value="$user->kecamatan ?? ''" />
                    <button class="btn btn-sm py-1 btn-secondary position-absolute" type="button" style="right: 20px;" onclick="open_search_location('', 'kecamatan', '43993')">Cari</button>
                </div>
            </div>
            <div class="row mb-6" id="form_group_desa">
                <label class="col-lg-3 col-form-label fw-bold fs-6">Desa</label>
                <div class="col-lg-9 position-relative d-flex flex-row align-items-center">
                    <x-input name="desa" class="form-control-solid" :value="$user->desa ?? ''" />
                    <button class="btn btn-sm py-1 btn-secondary position-absolute d-none" id="button_search_desa" type="button" style="right: 20px;" onclick="open_search_location('', 'desa')">Cari</button>
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
    init_form({{ $user->id ?? '' }});

    $kecamatan = $('#kecamatan');
    $kecamatan.change(() => {
        if ($kecamatan.val() !== '') $('#button_search_desa').removeClass('d-none');
    });
</script>
