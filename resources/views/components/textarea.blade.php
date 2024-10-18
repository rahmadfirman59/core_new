<textarea
    name="{{ $name }}"
    id="{{ $prefix.$name }}"
    rows="{{ $rows }}"
    class="form-control {{ $class }}"
    placeholder="{{ $caption }}"
    {{ $required != '' ? 'required' : '' }}
    {{ $attributes }}
>{{ $value }}</textarea>
@if($alert === '1')
    <div class="alert alert-danger d-flex align-items-center p-5 mt-5 d-none w-100" @error($name) style="display: block!important;" @enderror id="{{ $prefix.$name }}_error">
        <div class="d-flex flex-column align-items-start" id="{{ $prefix.$name }}_error_content">
            @error($name) <span>{{ $message }}</span> @enderror
        </div>
    </div>
@endif
