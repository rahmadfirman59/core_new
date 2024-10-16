<div class="card">
    <form id="form_info">
        @csrf
        <div class="card-header">
            <div class="card-title ">{{ !empty($user) ? 'Ubah' : 'Tambah' }} User</div>
        </div>
        <div class="card-body">
            <x-my-input name="nama" caption="Nama" :value="$user->nama ?? ''"  />
            <x-my-input name="email" caption="Email" :value="$user->email ?? ''" />
            <x-my-input name="password" caption="Password" type="password" />
            <x-my-input name="password_confirmation" caption="Ulangi Password" type="password" />
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
