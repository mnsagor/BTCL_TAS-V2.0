@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.maintenanceHistory.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.maintenance-histories.update", [$maintenanceHistory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('region_name') ? 'has-error' : '' }}">
                            <label class="required" for="region_name_id">{{ trans('cruds.maintenanceHistory.fields.region_name') }}</label>
                            <select class="form-control select2" name="region_name_id" id="region_name_id" required>
                                @foreach($region_names as $id => $region_name)
                                    <option value="{{ $id }}" {{ (old('region_name_id') ? old('region_name_id') : $maintenanceHistory->region_name->id ?? '') == $id ? 'selected' : '' }}>{{ $region_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('region_name'))
                                <span class="help-block" role="alert">{{ $errors->first('region_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.maintenanceHistory.fields.region_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
                            <label class="required" for="office_name_id">{{ trans('cruds.maintenanceHistory.fields.office_name') }}</label>
                            <select class="form-control select2" name="office_name_id" id="office_name_id" required>
                                @foreach($office_names as $id => $office_name)
                                    <option value="{{ $id }}" {{ (old('office_name_id') ? old('office_name_id') : $maintenanceHistory->office_name->id ?? '') == $id ? 'selected' : '' }}>{{ $office_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('office_name'))
                                <span class="help-block" role="alert">{{ $errors->first('office_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.maintenanceHistory.fields.office_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }}">
                            <label class="required" for="registration_number_id">{{ trans('cruds.maintenanceHistory.fields.registration_number') }}</label>
                            <select class="form-control select2" name="registration_number_id" id="registration_number_id" required>
                                @foreach($registration_numbers as $id => $registration_number)
                                    <option value="{{ $id }}" {{ (old('registration_number_id') ? old('registration_number_id') : $maintenanceHistory->registration_number->id ?? '') == $id ? 'selected' : '' }}>{{ $registration_number }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('registration_number'))
                                <span class="help-block" role="alert">{{ $errors->first('registration_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.maintenanceHistory.fields.registration_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.maintenanceHistory.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $maintenanceHistory->date) }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.maintenanceHistory.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                            <label class="required" for="cost">{{ trans('cruds.maintenanceHistory.fields.cost') }}</label>
                            <input class="form-control" type="text" name="cost" id="cost" value="{{ old('cost', $maintenanceHistory->cost) }}" required>
                            @if($errors->has('cost'))
                                <span class="help-block" role="alert">{{ $errors->first('cost') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.maintenanceHistory.fields.cost_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_detail') ? 'has-error' : '' }}">
                            <label for="work_detail">{{ trans('cruds.maintenanceHistory.fields.work_detail') }}</label>
                            <textarea class="form-control ckeditor" name="work_detail" id="work_detail">{!! old('work_detail', $maintenanceHistory->work_detail) !!}</textarea>
                            @if($errors->has('work_detail'))
                                <span class="help-block" role="alert">{{ $errors->first('work_detail') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.maintenanceHistory.fields.work_detail_helper') }}</span>
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
                xhr.open('POST', '/admin/maintenance-histories/ckmedia', true);
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
                data.append('crud_id', '{{ $maintenanceHistory->id ?? 0 }}');
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