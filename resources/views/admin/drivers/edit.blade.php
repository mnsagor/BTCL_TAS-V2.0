@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.driver.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.drivers.update", [$driver->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.driver.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $driver->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('emp_type') ? 'has-error' : '' }}">
                            <label for="emp_type">{{ trans('cruds.driver.fields.emp_type') }}</label>
                            <input class="form-control" type="text" name="emp_type" id="emp_type" value="{{ old('emp_type', $driver->emp_type) }}">
                            @if($errors->has('emp_type'))
                                <span class="help-block" role="alert">{{ $errors->first('emp_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.emp_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('emp_number') ? 'has-error' : '' }}">
                            <label for="emp_number">{{ trans('cruds.driver.fields.emp_number') }}</label>
                            <input class="form-control" type="text" name="emp_number" id="emp_number" value="{{ old('emp_number', $driver->emp_number) }}">
                            @if($errors->has('emp_number'))
                                <span class="help-block" role="alert">{{ $errors->first('emp_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.emp_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label class="required" for="mobile">{{ trans('cruds.driver.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $driver->mobile) }}" required>
                            @if($errors->has('mobile'))
                                <span class="help-block" role="alert">{{ $errors->first('mobile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dl_number') ? 'has-error' : '' }}">
                            <label class="required" for="dl_number">{{ trans('cruds.driver.fields.dl_number') }}</label>
                            <input class="form-control" type="text" name="dl_number" id="dl_number" value="{{ old('dl_number', $driver->dl_number) }}" required>
                            @if($errors->has('dl_number'))
                                <span class="help-block" role="alert">{{ $errors->first('dl_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.dl_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dl_validity_year') ? 'has-error' : '' }}">
                            <label class="required" for="dl_validity_year">{{ trans('cruds.driver.fields.dl_validity_year') }}</label>
                            <input class="form-control date" type="text" name="dl_validity_year" id="dl_validity_year" value="{{ old('dl_validity_year', $driver->dl_validity_year) }}" required>
                            @if($errors->has('dl_validity_year'))
                                <span class="help-block" role="alert">{{ $errors->first('dl_validity_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.dl_validity_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_posted') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.driver.fields.is_posted') }}</label>
                            @foreach(App\Models\Driver::IS_POSTED_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_posted_{{ $key }}" name="is_posted" value="{{ $key }}" {{ old('is_posted', $driver->is_posted) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_posted_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_posted'))
                                <span class="help-block" role="alert">{{ $errors->first('is_posted') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.is_posted_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_allocated') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.driver.fields.is_allocated') }}</label>
                            @foreach(App\Models\Driver::IS_ALLOCATED_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_allocated_{{ $key }}" name="is_allocated" value="{{ $key }}" {{ old('is_allocated', $driver->is_allocated) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_allocated_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_allocated'))
                                <span class="help-block" role="alert">{{ $errors->first('is_allocated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.is_allocated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.driver.fields.is_active') }}</label>
                            @foreach(App\Models\Driver::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $driver->is_active) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driver.fields.is_active_helper') }}</span>
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