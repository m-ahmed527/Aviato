@props([
    'type' => $type ?? 'text',
    'placeholder' => $placeholder ?? '',
    'rows',
    'name' => $name ?? '',
    'value' => $value ?? ''
])
@if ($type == 'msg')
    <div class="form-group">
        <textarea rows="{{ $rows }}" placeholder="{{ $placeholder }}" class="form-control" name="{{ $name }}" value="{{ $value}}"></textarea>
    </div>
@else
    <div class="form-group">
        <input type="{{ $type }}" class="form-control" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value}}">
    </div>
    @error($name)
        <span class="text-danger">{{ $message}}</span>
    @enderror
@endif
