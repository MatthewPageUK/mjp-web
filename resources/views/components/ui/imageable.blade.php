@props(['model'])

@if ($model->hasImage())
    <img src="{{ $model->imageUrl }}" {!! $attributes->merge(['class' => 'w-full']) !!} />
@endif
