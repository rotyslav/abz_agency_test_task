@csrf

<label class="form-label">Email address</label>
<input type="email" class="form-control" name="email" value="{{ isset($employee) ? $employee->email : '' }}">

<label class="form-label">Name</label>
<input type="text" class="form-control" name="name" value="{{ isset($employee) ? $employee->name : '' }}">
<br>

<label class="form-label">Position</label>
@foreach($positions as $position)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="position_id" id="flexRadioDefault1"
               value="{{ $position->id }}"
               @if(isset($employee))
                   @if($employee->position_id == $position->id) checked @endif>
        @endif
        <label class="form-check-label" for="flexRadioDefault1">
            {{ $position->position }}
        </label>
    </div>
@endforeach
<br>

<label class="form-label">Phone (Format +380-XX-XXX-XX-XX)</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="+38 (___) ___-__-__"
       value="{{ isset($employee) ? $employee->phone : '' }}">
<br>

<label class="form-label">Salary</label>
<input type="text" class="form-control" name="salary" value="{{ isset($employee) ? $employee->salary : '' }}">
<br>

<label class="form-label">Date of Employment</label>
<input type="date" class="form-control" name="date_of_employment"
       value="{{ isset($employee) ? $employee->date_of_employment : '' }}">
<br>
<label class="form-label">Headmen</label>
<input type="text" class="form-control" name="headmen"
       value="{{ isset($employee) ? $employee->headmen->name : '' }}">
<br>

<input type="submit" class="btn btn-primary" value="Submit">
