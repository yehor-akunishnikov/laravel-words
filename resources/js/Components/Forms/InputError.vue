<script setup lang="ts">
defineProps<{
    message?: string;
}>();
</script>

<template>
    <div :class="{ invisible: !message }">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>
