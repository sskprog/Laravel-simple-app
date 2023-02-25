<div class="mb-3">
    <label for="emp_name" class="form-label">ФИО</label>
    <input type="text" class="form-control" name="emp_name" placeholder="ФИО"
        value="{{ isset($employee) ? $employee->emp_name : old('emp_name') }}">
    @error('emp_name')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="company" class="form-label">Компания</label>
    <select name="company_id" class="form-select">
        @foreach ($companies as $key => $value)
        <option value="{{$key}}" {{ isset($employee) && $key === $employee->company_id ? 'selected' : false }}> {{$value}}</option>
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