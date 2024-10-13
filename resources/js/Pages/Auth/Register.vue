<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />
    <GuestLayout>
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>
        <!-- title -->
        <div>
            <h2 class="text-2xl font-semibold mb-1.5 z-[9999]"> Sign up to get started </h2>
            <p class="text-sm text-gray-700 font-normal">If you already have an account,
                <Link :href="route('login')" class="text-blue-700">Login here!</Link>
            </p>
        </div>


        <!-- form -->
        <form @submit.prevent="submit" class="space-y-7 text-sm text-black font-medium dark:text-white"
            uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">

            <div class="grid grid-cols-2 gap-4 gap-y-7">

                <!-- first name -->
                <div class="col-span-2">
                    <InputLabel for="name" value="Name" />
                    <div class="mt-2.5">
                        <TextInput id="text" name="name" type="text" autofocus="" placeholder="Name" required=""
                            v-model="form.name" />
                    </div>
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>


                <!-- email -->
                <div class="col-span-2">
                    <InputLabel for="email" value="Email address" />
                    <div class="mt-2.5">
                        <TextInput id="email" name="email" type="email" placeholder="Email" required=""
                            v-model="form.email" />
                    </div>

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- password -->
                <div>
                    <InputLabel for="password" value="Password" />
                    <div class="mt-2.5">
                        <TextInput id="password" name="password" type="password" v-model="form.password" />
                    </div>

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <InputLabel for="confirm_password" value="Confirm Password" />
                    <div class="mt-2.5">
                        <TextInput id="password_confirmation" name="password_confirmation" type="password"
                            v-model="form.password_confirmation" />
                    </div>
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="col-span-2">

                    <label class="inline-flex items-center" id="rememberme">
                        <input type="checkbox" id="accept-terms" class="!rounded-md accent-red-800" required />
                        <span class="ml-2">Agree to our <a href="#" class="text-blue-700 hover:underline">terms
                                of use. </a> </span>
                    </label>

                </div>


                <!-- submit button -->
                <div class="col-span-2">
                    <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" type="submit"
                        class="button bg-primary text-white w-full">Get Started</button>
                </div>

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
