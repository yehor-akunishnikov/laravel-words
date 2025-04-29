<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();
</script>

<template>
    <Head title="Welcome" />

    <div>
        <header>
            <nav v-if="canLogin">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('hub.index')"
                    class="text-black"
                >
                    Hub
                </Link>
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('logout')"
                    method="post"
                >
                    Log Out
                </Link>

                <template v-else>
                    <Link :href="route('login')" class="text-black">
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="text-black"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
    </div>
</template>
