<script setup lang="ts">
withDefaults(defineProps<{
    variant: 'danger' | 'primary' | 'secondary';
}>(), {
    variant: 'primary'
});

const dangerClass = [
    'inline-flex items-center rounded-md border border-transparent',
    'bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest',
    'text-white transition duration-150 ease-in-out hover:bg-red-500',
    'focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700'
].join(' ');
const primaryClass = [
    'inline-block items-center rounded-md border border-transparent bg-gray-800 px-4',
    'py-2 text-xs font-semibold uppercase tracking-widest text-white transition',
    'duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none',
    'focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900'
].join(' ');
const secondaryClass = [
    'inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2',
    'text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition',
    'duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2',
    'focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25'
].join(' ');
</script>

<template>
    <button
        :class="{
            [dangerClass]: variant === 'danger',
            [primaryClass]: variant === 'primary',
            [secondaryClass]: variant === 'secondary'
        }"
    >
        <slot />
    </button>
</template>
