@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.employee.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.employees.update", [$employee->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.employee.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $employee->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                            <label class="required" for="designation_id">{{ trans('cruds.employee.fields.designation') }}</label>
                            <select class="form-control select2" name="designation_id" id="designation_id" required>
                                @foreach($designations as $id => $designation)
                                    <option value="{{ $id }}" {{ (old('designation_id') ? old('designation_id') : $employee->designation->id ?? '') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('designation'))
                                <span class="help-block" role="alert">{{ $errors->first('designation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.designation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('office') ? 'has-error' : '' }}">
                            <label class="required" for="office_id">{{ trans('cruds.employee.fields.office') }}</label>
                            <select class="form-control select2" name="office_id" id="office_id" required>
                                @foreach($offices as $id => $office)
                                    <option value="{{ $id }}" {{ (old('office_id') ? old('office_id') : $employee->office->id ?? '') == $id ? 'selected' : '' }}>{{ $office }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('office'))
                                <span class="help-block" role="alert">{{ $errors->first('office') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.office_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label class="required" for="mobile">{{ trans('cruds.employee.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $employee->mobile) }}" required>
                            @if($errors->has('mobile'))
                                <span class="help-block" role="alert">{{ $errors->first('mobile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.employee.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $employee->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.employee.fields.sex') }}</label>
                            @foreach(App\Models\Employee::SEX_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="sex_{{ $key }}" name="sex" value="{{ $key }}" {{ old('sex', $employee->sex) === (string) $key ? 'checked' : '' }} required>
                                    <label for="sex_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('sex'))
                                <span class="help-block" role="alert">{{ $errors->first('sex') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.sex_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nid') ? 'has-error' : '' }}">
                            <label class="required" for="nid">{{ trans('cruds.employee.fields.nid') }}</label>
                            <input class="form-control" type="text" name="nid" id="nid" value="{{ old('nid', $employee->nid) }}" required>
                            @if($errors->has('nid'))
                                <span class="help-block" role="alert">{{ $errors->first('nid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.nid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection