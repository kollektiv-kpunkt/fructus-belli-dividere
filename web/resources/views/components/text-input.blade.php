@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-accent-80 focus:ring-accent-80 rounded-md shadow-sm']) !!}>
