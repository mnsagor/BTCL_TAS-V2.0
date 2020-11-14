@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.postingAllocation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.posting-allocations.update", [$postingAllocation->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name_id">{{ trans('cruds.postingAllocation.fields.name') }}</label>
                            <select class="form-control select2" name="name_id" id="name_id" required>
                                @foreach($names as $id => $name)
                                    <option value="{{ $id }}" {{ (old('name_id') ? old('name_id') : $postingAllocation->name->id ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postingAllocation.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('region_name') ? 'has-error' : '' }}">
                            <label class="required" for="region_name_id">{{ trans('cruds.postingAllocation.fields.region_name') }}</label>
                            <select class="form-control select2" name="region_name_id" id="region_name_id" required>
                                @foreach($region_names as $id => $region_name)
                                    <option value="{{ $id }}" {{ (old('region_name_id') ? old('region_name_id') : $postingAllocation->region_name->id ?? '') == $id ? 'selected' : '' }}>{{ $region_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('region_name'))
                                <span class="help-block" role="alert">{{ $errors->first('region_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postingAllocation.fields.region_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
                            <label class="required" for="office_name_id">{{ trans('cruds.postingAllocation.fields.office_name') }}</label>
                            <select class="form-control select2" name="office_name_id" id="office_name_id" required>
                                @foreach($office_names as $id => $office_name)
                                    <option value="{{ $id }}" {{ (old('office_name_id') ? old('office_name_id') : $postingAllocation->office_name->id ?? '') == $id ? 'selected' : '' }}>{{ $office_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('office_name'))
                                <span class="help-block" role="alert">{{ $errors->first('office_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postingAllocation.fields.office_name_helper') }}</span>
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