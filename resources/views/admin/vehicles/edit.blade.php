@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.vehicle.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.vehicles.update", [$vehicle->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('registration_number') ? 'has-error' : '' }}">
                            <label class="required" for="registration_number">{{ trans('cruds.vehicle.fields.registration_number') }}</label>
                            <input class="form-control" type="text" name="registration_number" id="registration_number" value="{{ old('registration_number', $vehicle->registration_number) }}" required>
                            @if($errors->has('registration_number'))
                                <span class="help-block" role="alert">{{ $errors->first('registration_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.registration_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vehicle_type') ? 'has-error' : '' }}">
                            <label class="required" for="vehicle_type_id">{{ trans('cruds.vehicle.fields.vehicle_type') }}</label>
                            <select class="form-control select2" name="vehicle_type_id" id="vehicle_type_id" required>
                                @foreach($vehicle_types as $id => $vehicle_type)
                                    <option value="{{ $id }}" {{ (old('vehicle_type_id') ? old('vehicle_type_id') : $vehicle->vehicle_type->id ?? '') == $id ? 'selected' : '' }}>{{ $vehicle_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vehicle_type'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                            <label for="model">{{ trans('cruds.vehicle.fields.model') }}</label>
                            <input class="form-control" type="text" name="model" id="model" value="{{ old('model', $vehicle->model) }}">
                            @if($errors->has('model'))
                                <span class="help-block" role="alert">{{ $errors->first('model') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.model_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('model_year') ? 'has-error' : '' }}">
                            <label for="model_year">{{ trans('cruds.vehicle.fields.model_year') }}</label>
                            <input class="form-control" type="text" name="model_year" id="model_year" value="{{ old('model_year', $vehicle->model_year) }}">
                            @if($errors->has('model_year'))
                                <span class="help-block" role="alert">{{ $errors->first('model_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.model_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('engine_capacity') ? 'has-error' : '' }}">
                            <label class="required" for="engine_capacity">{{ trans('cruds.vehicle.fields.engine_capacity') }}</label>
                            <input class="form-control" type="text" name="engine_capacity" id="engine_capacity" value="{{ old('engine_capacity', $vehicle->engine_capacity) }}" required>
                            @if($errors->has('engine_capacity'))
                                <span class="help-block" role="alert">{{ $errors->first('engine_capacity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.engine_capacity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('chassis_number') ? 'has-error' : '' }}">
                            <label class="required" for="chassis_number">{{ trans('cruds.vehicle.fields.chassis_number') }}</label>
                            <input class="form-control" type="text" name="chassis_number" id="chassis_number" value="{{ old('chassis_number', $vehicle->chassis_number) }}" required>
                            @if($errors->has('chassis_number'))
                                <span class="help-block" role="alert">{{ $errors->first('chassis_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.chassis_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('engine_number') ? 'has-error' : '' }}">
                            <label class="required" for="engine_number">{{ trans('cruds.vehicle.fields.engine_number') }}</label>
                            <input class="form-control" type="text" name="engine_number" id="engine_number" value="{{ old('engine_number', $vehicle->engine_number) }}" required>
                            @if($errors->has('engine_number'))
                                <span class="help-block" role="alert">{{ $errors->first('engine_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.engine_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('condition') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.vehicle.fields.condition') }}</label>
                            <select class="form-control" name="condition" id="condition">
                                <option value disabled {{ old('condition', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Vehicle::CONDITION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('condition', $vehicle->condition) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('condition'))
                                <span class="help-block" role="alert">{{ $errors->first('condition') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.condition_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ragistration_date') ? 'has-error' : '' }}">
                            <label for="ragistration_date">{{ trans('cruds.vehicle.fields.ragistration_date') }}</label>
                            <input class="form-control date" type="text" name="ragistration_date" id="ragistration_date" value="{{ old('ragistration_date', $vehicle->ragistration_date) }}">
                            @if($errors->has('ragistration_date'))
                                <span class="help-block" role="alert">{{ $errors->first('ragistration_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.ragistration_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fc_start_date') ? 'has-error' : '' }}">
                            <label class="required" for="fc_start_date">{{ trans('cruds.vehicle.fields.fc_start_date') }}</label>
                            <input class="form-control date" type="text" name="fc_start_date" id="fc_start_date" value="{{ old('fc_start_date', $vehicle->fc_start_date) }}" required>
                            @if($errors->has('fc_start_date'))
                                <span class="help-block" role="alert">{{ $errors->first('fc_start_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.fc_start_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fc_end_date') ? 'has-error' : '' }}">
                            <label class="required" for="fc_end_date">{{ trans('cruds.vehicle.fields.fc_end_date') }}</label>
                            <input class="form-control date" type="text" name="fc_end_date" id="fc_end_date" value="{{ old('fc_end_date', $vehicle->fc_end_date) }}" required>
                            @if($errors->has('fc_end_date'))
                                <span class="help-block" role="alert">{{ $errors->first('fc_end_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.fc_end_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fc_file') ? 'has-error' : '' }}">
                            <label for="fc_file">{{ trans('cruds.vehicle.fields.fc_file') }}</label>
                            <div class="needsclick dropzone" id="fc_file-dropzone">
                            </div>
                            @if($errors->has('fc_file'))
                                <span class="help-block" role="alert">{{ $errors->first('fc_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.fc_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tt_start_date') ? 'has-error' : '' }}">
                            <label class="required" for="tt_start_date">{{ trans('cruds.vehicle.fields.tt_start_date') }}</label>
                            <input class="form-control date" type="text" name="tt_start_date" id="tt_start_date" value="{{ old('tt_start_date', $vehicle->tt_start_date) }}" required>
                            @if($errors->has('tt_start_date'))
                                <span class="help-block" role="alert">{{ $errors->first('tt_start_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.tt_start_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tt_end_date') ? 'has-error' : '' }}">
                            <label class="required" for="tt_end_date">{{ trans('cruds.vehicle.fields.tt_end_date') }}</label>
                            <input class="form-control date" type="text" name="tt_end_date" id="tt_end_date" value="{{ old('tt_end_date', $vehicle->tt_end_date) }}" required>
                            @if($errors->has('tt_end_date'))
                                <span class="help-block" role="alert">{{ $errors->first('tt_end_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.tt_end_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tt_file') ? 'has-error' : '' }}">
                            <label for="tt_file">{{ trans('cruds.vehicle.fields.tt_file') }}</label>
                            <div class="needsclick dropzone" id="tt_file-dropzone">
                            </div>
                            @if($errors->has('tt_file'))
                                <span class="help-block" role="alert">{{ $errors->first('tt_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.tt_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_document') ? 'has-error' : '' }}">
                            <label for="other_document">{{ trans('cruds.vehicle.fields.other_document') }}</label>
                            <div class="needsclick dropzone" id="other_document-dropzone">
                            </div>
                            @if($errors->has('other_document'))
                                <span class="help-block" role="alert">{{ $errors->first('other_document') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.other_document_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fuel_types') ? 'has-error' : '' }}">
                            <label for="fuel_types">{{ trans('cruds.vehicle.fields.fuel_type') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="fuel_types[]" id="fuel_types" multiple>
                                @foreach($fuel_types as $id => $fuel_type)
                                    <option value="{{ $id }}" {{ (in_array($id, old('fuel_types', [])) || $vehicle->fuel_types->contains($id)) ? 'selected' : '' }}>{{ $fuel_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fuel_types'))
                                <span class="help-block" role="alert">{{ $errors->first('fuel_types') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.fuel_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fuel_consumption_rate') ? 'has-error' : '' }}">
                            <label for="fuel_consumption_rate">{{ trans('cruds.vehicle.fields.fuel_consumption_rate') }}</label>
                            <input class="form-control" type="text" name="fuel_consumption_rate" id="fuel_consumption_rate" value="{{ old('fuel_consumption_rate', $vehicle->fuel_consumption_rate) }}">
                            @if($errors->has('fuel_consumption_rate'))
                                <span class="help-block" role="alert">{{ $errors->first('fuel_consumption_rate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.fuel_consumption_rate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('engine_overhaulting_date') ? 'has-error' : '' }}">
                            <label for="engine_overhaulting_date">{{ trans('cruds.vehicle.fields.engine_overhaulting_date') }}</label>
                            <input class="form-control date" type="text" name="engine_overhaulting_date" id="engine_overhaulting_date" value="{{ old('engine_overhaulting_date', $vehicle->engine_overhaulting_date) }}">
                            @if($errors->has('engine_overhaulting_date'))
                                <span class="help-block" role="alert">{{ $errors->first('engine_overhaulting_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.engine_overhaulting_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vehicle_source') ? 'has-error' : '' }}">
                            <label for="vehicle_source">{{ trans('cruds.vehicle.fields.vehicle_source') }}</label>
                            <input class="form-control" type="text" name="vehicle_source" id="vehicle_source" value="{{ old('vehicle_source', $vehicle->vehicle_source) }}">
                            @if($errors->has('vehicle_source'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle_source') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_source_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('entry_date') ? 'has-error' : '' }}">
                            <label for="entry_date">{{ trans('cruds.vehicle.fields.entry_date') }}</label>
                            <input class="form-control date" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date', $vehicle->entry_date) }}">
                            @if($errors->has('entry_date'))
                                <span class="help-block" role="alert">{{ $errors->first('entry_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.entry_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vehicle_allocation_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.vehicle.fields.vehicle_allocation_status') }}</label>
                            @foreach(App\Models\Vehicle::VEHICLE_ALLOCATION_STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="vehicle_allocation_status_{{ $key }}" name="vehicle_allocation_status" value="{{ $key }}" {{ old('vehicle_allocation_status', $vehicle->vehicle_allocation_status) === (string) $key ? 'checked' : '' }}>
                                    <label for="vehicle_allocation_status_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('vehicle_allocation_status'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle_allocation_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_allocation_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('driver_allocation_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.vehicle.fields.driver_allocation_status') }}</label>
                            @foreach(App\Models\Vehicle::DRIVER_ALLOCATION_STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="driver_allocation_status_{{ $key }}" name="driver_allocation_status" value="{{ $key }}" {{ old('driver_allocation_status', $vehicle->driver_allocation_status) === (string) $key ? 'checked' : '' }}>
                                    <label for="driver_allocation_status_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('driver_allocation_status'))
                                <span class="help-block" role="alert">{{ $errors->first('driver_allocation_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.driver_allocation_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="required" for="image">{{ trans('cruds.vehicle.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.vehicle.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $vehicle->description) !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vehicle.fields.description_helper') }}</span>
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
    var uploadedFcFileMap = {}
Dropzone.options.fcFileDropzone = {
    url: '{{ route('admin.vehicles.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="fc_file[]" value="' + response.name + '">')
      uploadedFcFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFcFileMap[file.name]
      }
      $('form').find('input[name="fc_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($vehicle) && $vehicle->fc_file)
          var files =
            {!! json_encode($vehicle->fc_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="fc_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedTtFileMap = {}
Dropzone.options.ttFileDropzone = {
    url: '{{ route('admin.vehicles.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="tt_file[]" value="' + response.name + '">')
      uploadedTtFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedTtFileMap[file.name]
      }
      $('form').find('input[name="tt_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($vehicle) && $vehicle->tt_file)
          var files =
            {!! json_encode($vehicle->tt_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="tt_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedOtherDocumentMap = {}
Dropzone.options.otherDocumentDropzone = {
    url: '{{ route('admin.vehicles.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="other_document[]" value="' + response.name + '">')
      uploadedOtherDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedOtherDocumentMap[file.name]
      }
      $('form').find('input[name="other_document[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($vehicle) && $vehicle->other_document)
          var files =
            {!! json_encode($vehicle->other_document) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="other_document[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedImageMap = {}
Dropzone.options.imageDropzone = {
    url: '{{ route('admin.vehicles.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($vehicle) && $vehicle->image)
      var files = {!! json_encode($vehicle->image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
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
                xhr.open('POST', '/admin/vehicles/ckmedia', true);
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
                data.append('crud_id', '{{ $vehicle->id ?? 0 }}');
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