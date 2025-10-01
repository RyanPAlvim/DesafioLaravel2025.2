<div {{ $attributes->merge(['class' => 'fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50']) }} x-data="{ show: @entangle($attributes->wire('model')).defer }" x-show="show" style="display: none;">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-lg mx-4" @click.away="show = false">
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</div>
