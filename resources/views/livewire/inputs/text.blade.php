<div class="py-2">
    {{-- Be like water. --}}
    <label class="block text-gray-800 text-sm font-bold mb-2" for="{{ $name }}">{{ $label }}</label>
    <input class="w-full border focus:shadow-outline focus:outline-none" type="text" name="{{ $name }}" wire:model="value" id="">
    {{ $value }}
</div>
