<script lang="ts" setup>
import {Head, useForm} from "@inertiajs/vue3";

import InputError from "@/Components/Forms/InputError.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Btn/Button.vue";

const props = defineProps<{
    email: string;
    token: string;
}>();

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password"/>

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
                    autocomplete="new-password"
                    class="mt-1 block w-full"
                    required
                    type="password"
                />

                <InputError :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>

                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    autocomplete="new-password"
                    class="mt-1 block w-full"
                    required
                    type="password"
                />

                <InputError
                    :message="form.errors.password_confirmation"
                    class="mt-2"
                />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    variant="primary"
                >
                    Reset Password
                </Button>
            </div>
        </form>
    </GuestLayout>
</template>
