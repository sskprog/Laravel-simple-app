<div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" name="name" placeholder="Название компании"
        value="{{  $company ? $company->name : old('name') }}">
    @error('name')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Электронная почта</label>
    <input type="text" class="form-control" name="email" placeholder="Электронная почта"
        value="{{ $company ? $company->email : old('name') }}">
    @error('email')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="address" class="form-label">Адрес</label>
    <input type="text" class="form-control" name="address" placeholder="Адрес компании"
        value="{{ $company ? $company->address : old('name') }}">
    @error('address')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="input-group mb-3">
    <input type="file" class="form-control">
</div>
<button type="submit" class="btn btn-primary"> {{ $company ? 'Сохранить' : 'Создать' }} </button>