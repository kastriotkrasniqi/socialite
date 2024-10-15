<script setup>
import { useForm } from '@inertiajs/vue3';
import { useGlobalSearchStore } from '@/stores/GlobalSearch';
import { ref } from 'vue';

const results = useGlobalSearchStore();

const fetchResults = async (search) => {
    if (search != '') {
        results.fetchResults(search);
    } else {
        results.clearResults();
    }
}

</script>

<template>
    <div id="search--box"
        class="xl:w-[680px] sm:w-96 sm:relative rounded-xl overflow-hidden z-20 bg-secondery max-md:hidden w-screen left-0 max-sm:fixed max-sm:top-2 dark:!bg-white/5">
        <ion-icon name="search" class="absolute left-4 top-1/2 -translate-y-1/2"></ion-icon>
        <input @input="fetchResults($event.target.value)" name="search" type="text"
            placeholder="Search Friends, videos .." class="w-full !pl-10 !font-normal !bg-transparent h-12 !text-sm">
    </div>

    <!-- search dropdown-->
    <div class="hidden uk- open z-10"
        uk-drop="pos: bottom-center ; animation: uk-animation-slide-bottom-small;mode:click ">

        <div class="xl:w-[694px] sm:w-96 bg-white dark:bg-dark3 w-screen p-2 rounded-lg shadow-lg -mt-14 pt-14">
            <div class="flex justify-between px-2 py-2.5 text-sm font-medium">
                <div class=" text-black dark:text-white">Recent</div>
                <button type="button" class="text-blue-500">Clear</button>
            </div>
            <nav class="text-sm font-medium text-black dark:text-white" v-for="result in results.results"
                :key="result.id">
                <a href="#"
                    class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <img src="/images/avatars/avatar-2.jpg" class="w-9 h-9 rounded-full">
                    <div>
                        <div> {{ result.name }} </div>
                        <div class="text-xs text-blue-500 font-medium mt-0.5"> Friend </div>
                    </div> <ion-icon name="close"
                        class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                </a>
                <!-- <a href="#"
                    class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <img src="/images/avatars/avatar-2.jpg" class="w-9 h-9 rounded-full">
                    <div>
                        <div> Martin Gray </div>
                        <div class="text-xs text-blue-500 font-medium mt-0.5"> Friend </div>
                    </div> <ion-icon name="close"
                        class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                </a>
                <a href="#"
                    class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <img src="/images/group/group-2.jpg" class="w-9 h-9 rounded-full">
                    <div>
                        <div> Delicious Foods </div>
                        <div class="text-xs text-rose-500 font-medium mt-0.5"> Group </div>
                    </div> <ion-icon name="close"
                        class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                </a>
                <a href="#"
                    class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <img src="/images/group/group-1.jpg" class="w-9 h-9 rounded-full">
                    <div>
                        <div> Delicious Foods </div>
                        <div class="text-xs text-yellow-500 font-medium mt-0.5"> Page </div>
                    </div> <ion-icon name="close"
                        class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                </a>
                <a href="#"
                    class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <img src="/images/avatars/avatar-6.jpg" class="w-9 h-9 rounded-full">
                    <div>
                        <div> John Welim </div>
                        <div class="text-xs text-blue-500 font-medium mt-0.5"> Friend </div>
                    </div> <ion-icon name="close"
                        class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                </a>
                <a href="#"
                    class="hidden relative  px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <ion-icon class="text-2xl" name="search-outline"></ion-icon> Creative ideas
                    about Business </a>
                <a href="#"
                    class="hidden relative  px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                    <ion-icon class="text-2xl" name="search-outline"></ion-icon> 8 Facts About
                    Writting </a> -->
            </nav>
            <hr class="-mx-2 mt-2 hidden">
            <div class="flex justify-end pr-2 text-sm font-medium text-red-500 hidden">
                <a href="#" class="flex hover:bg-red-50 dark:hover:bg-slate-700 p-1.5 rounded">
                    <ion-icon name="trash" class="mr-2 text-lg"></ion-icon> Clear your
                    history</a>
            </div>
        </div>

    </div>
</template>
