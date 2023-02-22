<div class="mb-3">
    <label for="fullname" class="form-label">ФИО</label>
    <input type="text" class="form-control" name="name" placeholder="ФИО"
        value="{{ isset($employee) ? $employee->fullname : old('fullname') }}">
    @error('fullname')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="company" class="form-label">Компания</label>
    <select name="select" class="form-select">
        @foreach ($companies as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach
      </select>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email"
        value="{{ isset($employee) ? $employee->email : old('email') }}">
    @error('email')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="phone" class="form-label">Телефон</label>
    <input type="text" class="form-control" name="phone" placeholder="Телефон"
        value="{{ isset($employee) ? $employee->phone : old('phone') }}">
    @error('phone')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary"> {{ isset($employee) ? 'Сохранить' : 'Создать' }} </button>