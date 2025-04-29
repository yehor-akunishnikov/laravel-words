<script setup lang="ts">
import {Head} from "@inertiajs/vue3";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import HubLayout from "@/Layouts/HubLayout.vue";

defineOptions({
    layout: [AuthenticatedLayout, HubLayout]
})
</script>

<template>
    <Head title="Hub" />
    <p>Hub works</p>
</template>
