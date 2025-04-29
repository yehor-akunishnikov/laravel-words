<script setup lang="ts">
import RichTextEditor from '@/Components/Features/RichTextEditor.vue';
import InputError from '@/Components/Forms/InputError.vue';
import InputLabel from '@/Components/Forms/InputLabel.vue';
import TextArea from '@/Components/Forms/TextArea.vue';
import { onMounted, useTemplateRef } from 'vue';

const model = defineModel<string | undefined>({ required: true });

defineProps<{
    errorMessage?: string;
    type?: 'text' | 'email' | 'password' | 'textarea' | 'md';
    label?: string;
    id: string;
    containerClass?: string;
}>();

const input = useTemplateRef<HTMLInputElement | HTMLTextAreaElement>('input');

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

defineExpose({ focus: () => input.value?.focus() });
defineOptions({ inheritAttrs: false });
</script>

<template>
    <div :class="containerClass">
        <div v-if="type === 'md'">{{ label }}</div>
        <InputLabel v-if="label && type !== 'md'" :for="id" :value="label" />

        <TextArea
            v-if="type === 'textarea'"
            v-model="model"
            v-bind="$attrs"
            :id="id"
        />
        <RichTextEditor v-else-if="type === 'md'" v-model="model" />
        <input
            v-else
            :id="id"
            :type="type ?? 'text'"
            class="w-full rounded"
            v-model="model"
            autocomplete="off"
            v-bind="$attrs"
        />

        <InputError :message="errorMessage" />
    </div>
</template>
