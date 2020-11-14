@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.driverAllocation.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.driver-allocations.update", [$driverAllocation->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
                            <label class="required" for="office_name_id">{{ trans('cruds.driverAllocation.fields.office_name') }}</label>
                            <select class="form-control select2" name="office_name_id" id="office_name_id" required>
                                @foreach($office_names as $id => $office_name)
                                    <option value="{{ $id }}" {{ (old('office_name_id') ? old('office_name_id') : $driverAllocation->office_name->id ?? '') == $id ? 'selected' : '' }}>{{ $office_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('office_name'))
                                <span class="help-block" role="alert">{{ $errors->first('office_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driverAllocation.fields.office_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('driver_name') ? 'has-error' : '' }}">
                            <label class="required" for="driver_name_id">{{ trans('cruds.driverAllocation.fields.driver_name') }}</label>
                            <select class="form-control select2" name="driver_name_id" id="driver_name_id" required>
                                @foreach($driver_names as $id => $driver_name)
                                    <option value="{{ $id }}" {{ (old('driver_name_id') ? old('driver_name_id') : $driverAllocation->driver_name->id ?? '') == $id ? 'selected' : '' }}>{{ $driver_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('driver_name'))
                                <span class="help-block" role="alert">{{ $errors->first('driver_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driverAllocation.fields.driver_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }}">
                            <label class="required" for="registration_number_id">{{ trans('cruds.driverAllocation.fields.registration_number') }}</label>
                            <select class="form-control select2" name="registration_number_id" id="registration_number_id" required>
                                @foreach($registration_numbers as $id => $registration_number)
                                    <option value="{{ $id }}" {{ (old('registration_number_id') ? old('registration_number_id') : $driverAllocation->registration_number->id ?? '') == $id ? 'selected' : '' }}>{{ $registration_number }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('registration_number'))
                                <span class="help-block" role="alert">{{ $errors->first('registration_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driverAllocation.fields.registration_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('allocation_date') ? 'has-error' : '' }}">
                            <label class="required" for="allocation_date">{{ trans('cruds.driverAllocation.fields.allocation_date') }}</label>
                            <input class="form-control date" type="text" name="allocation_date" id="allocation_date" value="{{ old('allocation_date', $driverAllocation->allocation_date) }}" required>
                            @if($errors->has('allocation_date'))
                                <span class="help-block" role="alert">{{ $errors->first('allocation_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driverAllocation.fields.allocation_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.driverAllocation.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $driverAllocation->description) !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.driverAllocation.fields.description_helper') }}</span>
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
                xhr.open('POST', '/admin/driver-allocations/ckmedia', true);
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
                data.append('crud_id', '{{ $driverAllocation->id ?? 0 }}');
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