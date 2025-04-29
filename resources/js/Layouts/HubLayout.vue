<script setup lang="ts">
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="p-4 border border-black">
        <nav class=" p-2 border-x border-t border-black">
            <ul class="flex gap-x-4">
                <li>
                    <Link :href="route('words.index')">Words</Link>
                </li>
                <li>
                    <Link :href="route('fragments.index')">Fragments</Link>
                </li>
            </ul>
        </nav>
        <div class="p-2 border border-black">
            <slot />
        </div>
    </div>
</template>
