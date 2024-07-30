@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-neutral-700 dark:text-neutral-200']) }}>
    {{ $value ?? $slot }}
</label>
