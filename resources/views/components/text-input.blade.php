@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-neutral-400 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-purple-500 dark:focus:border-violet-400 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-2xl shadow-sm']) }}>
