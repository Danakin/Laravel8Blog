<div>
    <label class="block text-gray-800 text-sm font-bold mb-2" for="{{ $name }}">{{ $label }}</label>
    {{-- <textarea class="w-full border focus:shadow-outline focus:outline-none" name="{{ $name }}" cols="30" rows="10" wire:model="text"></textarea> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js" integrity="sha512-8iE6dgykdask8wKpgxYbLCJMwoXudIVsYbzVk8qD7OUiaBzFLtfpmT5N6L5E1uT3j2Qjz2ynZCfDdrmAJzMkVg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css" integrity="sha512-sC2S9lQxuqpjeJeom8VeDu/jUJrVfJM7pJJVuH9bqrZZYqGe7VhTASUb3doXVk6WtjD0O4DTS+xBx2Zpr1vRvg==" crossorigin="anonymous" />
    <div wire:ignore>
        <input name="{{ $name }}"" wire:model="text" type="hidden">
        <trix-editor wire:model.debounce="text" wire:key="trixEdit""></trix-editor>
    </div>

    {{ $text }}
</div>
