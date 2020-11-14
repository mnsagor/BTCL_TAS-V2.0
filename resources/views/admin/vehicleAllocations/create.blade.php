@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.vehicleAllocation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.vehicle-allocations.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('vehicle') ? 'has-error' : '' }}">
                            <label class="required" for="vehicle_id">{{ trans('cruds.vehicleAllocation.fields.vehicle') }}</label>
                            <select class="form-control select2" name="vehicle_id" id="vehicle_id" required>
                                @foreach($vehicles as $id => $vehicle)
                                    <option value="{{ $id }}" {{ old('vehicle_id') == $id ? 'selected' : '' }}>{{ $vehicle }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vehicle'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.vehicle_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
                            <label class="required" for="region_id">{{ trans('cruds.vehicleAllocation.fields.region') }}</label>
                            <select class="form-control select2" name="region_id" id="region_id" required>
                                @foreach($regions as $id => $region)
                                    <option value="{{ $id }}" {{ old('region_id') == $id ? 'selected' : '' }}>{{ $region }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('region'))
                                <span class="help-block" role="alert">{{ $errors->first('region') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.region_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('division') ? 'has-error' : '' }}">
                            <label class="required" for="division_id">{{ trans('cruds.vehicleAllocation.fields.division') }}</label>
                            <select class="form-control select2" name="division_id" id="division_id" required>
                                @foreach($divisions as $id => $division)
                                    <option value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $division }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division'))
                                <span class="help-block" role="alert">{{ $errors->first('division') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.division_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('allottee_name') ? 'has-error' : '' }}">
                            <label class="required" for="allottee_name_id">{{ trans('cruds.vehicleAllocation.fields.allottee_name') }}</label>
                            <select class="form-control select2" name="allottee_name_id" id="allottee_name_id" required>
                                @foreach($allottee_names as $id => $allottee_name)
                                    <option value="{{ $id }}" {{ old('allottee_name_id') == $id ? 'selected' : '' }}>{{ $allottee_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('allottee_name'))
                                <span class="help-block" role="alert">{{ $errors->first('allottee_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.allottee_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('allottee_designation') ? 'has-error' : '' }}">
                            <label class="required" for="allottee_designation_id">{{ trans('cruds.vehicleAllocation.fields.allottee_designation') }}</label>
                            <select class="form-control select2" name="allottee_designation_id" id="allottee_designation_id" required>
                                @foreach($allottee_designations as $id => $allottee_designation)
                                    <option value="{{ $id }}" {{ old('allottee_designation_id') == $id ? 'selected' : '' }}>{{ $allottee_designation }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('allottee_designation'))
                                <span class="help-block" role="alert">{{ $errors->first('allottee_designation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.allottee_designation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('allotment_date') ? 'has-error' : '' }}">
                            <label class="required" for="allotment_date">{{ trans('cruds.vehicleAllocation.fields.allotment_date') }}</label>
                            <input class="form-control date" type="text" name="allotment_date" id="allotment_date" value="{{ old('allotment_date') }}" required>
                            @if($errors->has('allotment_date'))
                                <span class="help-block" role="alert">{{ $errors->first('allotment_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.allotment_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.vehicleAllocation.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description') !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicleAllocation.fields.description_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/vehicle-allocations/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $vehicleAllocation->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection