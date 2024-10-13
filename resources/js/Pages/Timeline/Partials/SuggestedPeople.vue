<script setup>
import { useForm, usePage, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const isSendingRequest = ref(false);

const form = useForm({});

const props = defineProps({
    suggestedPeople: {
        type: Object,
    },
});
const addFriend = (userId) => {
    form.post(route('friends.request', userId), {
        preserveScroll: true,
        only: ['suggestedPeople'],
        onSuccess: () => isSendingRequest.value = false,
    });
};

</script>

<template>
    <div class="box p-5 px-6 border1 dark:bg-dark2">

        <div class="flex justify-between text-black dark:text-white">
            <h3 class="font-bold text-base"> People you may know </h3>
            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon>
            </button>
        </div>

        <div v-for="person in props.suggestedPeople" :key="person.id"
            class="space-y-4 capitalize text-xs font-normal mt-5 mb-2 text-gray-500 dark:text-white/80">

            <div class="flex items-center gap-3">
                <a href="timeline.html">
                    <img src="/images/avatars/avatar-7.jpg" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                </a>
                <div class="flex-1">
                    <a href="timeline.html">
                        <h4 class="font-semibold text-sm text-black dark:text-white">{{ person.name }}
                        </h4>
                    </a>
                    <div class="mt-0.5"> Suggested For You </div>
                </div>
                <button @click="addFriend(person.id)" type="button"
                    class="text-sm rounded-full py-1.5 px-4 font-semibold bg-primary" :disabled="form.processing"
                    :class="{ 'opacity-25': form.processing }">
                    Add friend
                </button>
            </div>

        </div>

    </div>

</template>
