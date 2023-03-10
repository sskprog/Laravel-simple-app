<div class="mb-3">
    <label for="name" class="form-label">Название</label>
    <input type="text" class="form-control" name="name" placeholder="Название компании"
        value="{{ isset($company) ? $company->name : old('name') }}">
    @error('name')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email"
        value="{{ isset($company) ? $company->email : old('email') }}">
    @error('email')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="address" class="form-label">Адрес</label>
    <input type="text" class="form-control" name="address" placeholder="Адрес компании"
        value="{{ isset($company) ? $company->address : old('address') }}">
    @error('address')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="logo" class="form-label">Логотип</label>
    <input type="file" class="form-control" name="logo">
    @error('logo')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary"> {{ isset($company) ? 'Сохранить' : 'Создать' }} </button>