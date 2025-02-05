@php
    use App\Enums\Role;
@endphp

<div class="row">
    <div class="col-6">
        @include('layouts.form.text', [
                   'title' => 'Название города*',
                   'name' => 'name',
                   'placeholder' => "Название города",
                   'value' => $city->name ?? null,
               ])
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="country_id">Страна*</label>
            <select class="form-control select2 select2-danger select2-hidden-accessible @error('country_id') is-invalid @enderror"
                    name="country_id" id="country_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option value="">Выбрать страну*</option>
                @foreach(\App\Models\Country::all() as $country)
                    <option value="{{ $country->id }}" @selected(old('country_id', $city->country_id ?? null) === $country->id)>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
