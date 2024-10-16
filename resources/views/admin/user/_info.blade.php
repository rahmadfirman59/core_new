<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title fs-3 fw-bold">{{ !empty($user) ? 'Ubah' : 'Tambah' }} User</div>
        </div>
        <div class="card-body">
            <x-metronic-input name="name" caption="Nama" :value="$user->name ?? ''" />
            <x-metronic-input name="email" caption="Email" :value="$user->email ?? ''" />
            <x-metronic-input name="password" caption="Password" type="password" />
            <x-metronic-input name="password_confirmation" caption="Ulangi Password" type="password" />
            <x-metronic-select name="akses" caption="Akses" :options="$list_akses" :value="$user->akses ?? ''" />
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
