<script setup lang="ts">
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <header class="flex justify-between">
        <Link :href="route('hub.index')">Logo</Link>
        <nav>
            <ul class="flex justify-between gap-x-4">
                <li>
                    <Link :href="route('hub.index')">Hub</Link>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <slot/>
    </main>
</template>
