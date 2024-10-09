<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Login" />
    <GuestLayout>
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>
        <!-- title -->
        <div>
            <h2 class="text-2xl font-semibold mb-1.5"> Sign in to your account </h2>
            <p class="text-sm text-gray-700 font-normal">If you haven’t signed up yet.
                <Link :href="route('register')" class="text-blue-700">Register here!</Link>
            </p>
        </div>


        <!-- form -->
        <form @submit.prevent="submit" class="space-y-7 text-sm text-black font-medium dark:text-white"
            uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">

            <!-- email -->
            <div>
                <InputLabel for="email" value="Email" />
                <div class="mt-2.5">
                    <TextInput id="email" name="email" type="email" autofocus="" v-model="form.email"
                        placeholder="Email" required="" />
                </div>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <!-- password -->
            <div>
                <InputLabel for="password" value="Password" />
                <div class="mt-2.5">
                    <TextInput id="password" type="password" name="password" v-model="form.password"
                        placeholder="***" />
                </div>
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-2.5">
                    <Checkbox name="rememberme" v-model:checked="form.remember" />
                    <label for="rememberme" class="font-normal">Remember me</label>
                </div>
                <Link v-if="canResetPassword" :href="route('password.request')" class="text-blue-700" />
                Forgot password
                <Link />
            </div>

            <!-- submit button -->
            <div>
                <button type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                    class="button bg-primary text-white w-full">Sign in</button>
            </div>

            <div class="text-center flex items-center gap-6">
                <hr class="flex-1 border-slate-200 dark:border-slate-800">
                Or continue with
                <hr class="flex-1 border-slate-200 dark:border-slate-800">
            </div>

            <!-- social login -->
            <div class="flex gap-2" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 400 ;repeat: true">
                <a href="#" class="button flex-1 flex items-center gap-2 bg-primary text-white text-sm">
                    <ion-icon name="logo-facebook" class="text-lg"></ion-icon> facebook </a>
                <a href="#" class="button flex-1 flex items-center gap-2 bg-sky-600 text-white text-sm">
                    <ion-icon name="logo-twitter"></ion-icon> twitter </a>
                <a href="#" class="button flex-1 flex items-center gap-2 bg-black text-white text-sm"> <ion-icon
                        name="logo-github"></ion-icon> github </a>
            </div>

        </form>

    </GuestLayout>
</template>
