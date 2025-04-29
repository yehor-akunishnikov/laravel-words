<script setup lang="ts">
import { useTemplateRef } from 'vue';

const model = defineModel<string | null | undefined>({ required: true });
const elementRef = useTemplateRef<HTMLTextAreaElement>('text-area-element');

defineExpose({
    elementRef,
});
</script>

<template>
    <textarea
        class="w-full resize-none rounded border border-black"
        v-model="model"
        autocomplete="off"
        ref="text-area-element"
        rows="5"
    ></textarea>
</template>
