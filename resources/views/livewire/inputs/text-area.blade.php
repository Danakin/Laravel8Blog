<div>
    <label class="block text-gray-800 text-sm font-bold mb-2" for="{{ $name }}">{{ $label }}</label>
    <textarea class="w-full border focus:shadow-outline focus:outline-none" name="{{ $name }}" id="" cols="30" rows="10" wire:model="text"></textarea>
    {{ $text }}
</div>
