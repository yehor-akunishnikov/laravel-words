<script lang="ts" setup>
import {Head, Link, useForm} from "@inertiajs/vue3";

import InputError from "@/Components/Forms/InputError.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Btn/Button.vue";

defineProps<{
    canResetPassword?: boolean;
    status?: string;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in"/>

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <label for="email">Email</label>

                <input
                    id="email"
                    v-model="form.email"
                    autocomplete="username"
                    autofocus
                    class="mt-1 block w-full"
                    required
                    type="email"
                />

                <InputError :message="form.errors.email" class="mt-2"/>
            </div>

            <div class="mt-4">
                <label for="password">Password</label>

                <input
                    id="password"
                    v-model="form.password"
                    autocomplete="current-password"
                    class="mt-1 block w-full"
                    required
                    type="password"
                />

                <InputError :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <input v-model="form.remember" name="remember" type="checkbox"/>
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Forgot your password?
                </Link>

                <Button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    class="ms-4"
                    variant="primary"
                >
                    Log in
                </Button>
            </div>
        </form>
    </GuestLayout>
</template>
