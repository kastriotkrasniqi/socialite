<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SuggestedPeople from './Partials/SuggestedPeople.vue';
import CreatePost from './Partials/CreatePost.vue';
import Post from '@/Components/Post.vue'
defineProps({
    suggestedPeople: {
        type: Object,
    },
    posts: {
        type: Object,
    }
})
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>


        <!-- timeline -->
        <div class="lg:flex 2xl:gap-16 gap-12 max-w-[1065px] mx-auto" id="js-oversized">

            <div class="max-w-[680px] mx-auto">

                <!-- stories -->
                <div class="mb-8">

                    <h3 class="font-extrabold text-2xl  text-black dark:text-white hidden"> Stories</h3>

                    <div class="relative" tabindex="-1" uk-slider="auto play: true;finite: true" uk-lightbox="">

                        <div class="py-5 uk-slider-container">

                            <ul class="uk-slider-items w-[calc(100%+14px)]"
                                uk-scrollspy="target: > li; cls: uk-animation-scale-up; delay: 20;repeat:true">
                                <li class="md:pr-3" uk-scrollspy-class="uk-animation-fade">
                                    <div class="md:w-16 md:h-16 w-12 h-12 rounded-full relative border-2 border-dashed grid place-items-center bg-slate-200 border-slate-300 dark:border-slate-700 dark:bg-dark2 shrink-0"
                                        uk-toggle="target: #create-story">
                                        <ion-icon name="camera" class="text-2xl"></ion-icon>
                                    </div>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-1.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-2.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-2.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-3.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-4.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-5.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-5.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-6.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-1.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-7.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-1.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-2.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-2.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-3.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-4.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-5.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-5.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-6.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2 hover:scale-[1.15] hover:-rotate-2 duration-300">
                                    <a href="/images/avatars/avatar-lg-1.jpg" data-caption="Caption 1">
                                        <div
                                            class="md:w-16 md:h-16 w-12 h-12 relative md:border-4 border-2 shadow border-white rounded-full overflow-hidden dark:border-slate-700">
                                            <img src="/images/avatars/avatar-7.jpg" alt=""
                                                class="absolute w-full h-full object-cover">
                                        </div>
                                    </a>
                                </li>
                                <li class="md:pr-3 pr-2">
                                    <div
                                        class="md:w-16 md:h-16 w-12 h-12 bg-slate-200/60 rounded-full dark:bg-dark2 animate-pulse">
                                    </div>
                                </li>
                            </ul>

                        </div>

                        <div class="max-md:hidden">

                            <button type="button"
                                class="absolute -translate-y-1/2 bg-white shadow rounded-full top-1/2 -left-3.5 grid w-8 h-8 place-items-center dark:bg-dark3"
                                uk-slider-item="previous"> <ion-icon name="chevron-back"
                                    class="text-2xl"></ion-icon></button>
                            <button type="button"
                                class="absolute -right-2 -translate-y-1/2 bg-white shadow rounded-full top-1/2 grid w-8 h-8 place-items-center dark:bg-dark3"
                                uk-slider-item="next"> <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
                            </button>

                        </div>


                    </div>

                </div>

                <!-- feed story -->
                <div class="md:max-w-[580px] mx-auto flex-1 xl:space-y-6 space-y-3">

                    <!-- add story -->
                    <CreatePost />
                    <!-- end add story -->


                    <!--  post -->
                    <template v-for="post in posts.data" :key="post.id">
                        <Post :post="post" />
                    </template>
                    <!--end post -->

                    <!-- placeholder -->
                    <!-- <div class="rounded-xl shadow-sm p-4 space-y-4 bg-slate-200/40 animate-pulse border1 dark:bg-dark2">

                        <div class="flex gap-3">
                            <div class="w-9 h-9 rounded-full bg-slate-300/20"></div>
                            <div class="flex-1 space-y-3">
                                <div class="w-40 h-5 rounded-md bg-slate-300/20"></div>
                                <div class="w-24 h-4 rounded-md bg-slate-300/20"></div>
                            </div>
                            <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
                        </div>

                        <div class="w-full h-52 rounded-lg bg-slate-300/10 my-3"> </div>

                        <div class="flex gap-3">

                            <div class="w-16 h-5 rounded-md bg-slate-300/20"></div>

                            <div class="w-14 h-5 rounded-md bg-slate-300/20"></div>

                            <div class="w-6 h-6 rounded-full bg-slate-300/20 ml-auto"></div>
                            <div class="w-6 h-6 rounded-full bg-slate-300/20  "></div>
                        </div>

                    </div> -->

                </div>

            </div>

            <!-- sidebar -->
            <div class="flex-1">

                <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6"
                    uk-sticky="media: 1024; end: #js-oversized; offset: 80">

                    <!-- // people_you_may_know -->
                    <!-- <div class="box p-5 px-6 hidden">

                        <div class="flex items-baseline justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> People you may know </h3>
                            <a href="#" class="text-sm text-blue-500">See all</a>
                        </div>

                        <div class="side-list" v-for="people in people_you_may_know" :key="people.id">

                            <div class="side-list-item">
                                <a href="timeline.html">
                                    <img src="/images/avatars/avatar-2.jpg" alt="" class="side-list-image rounded-full">
                                </a>
                                <div class="flex-1">
                                    <a href="timeline.html">
                                        <h4 class="side-list-title">{{ people.name }}</h4>
                                    </a>
                                    <div class="side-list-info"> 125k Following </div>
                                </div>
                                <form @submit.prevent="addFriend(people.id)">
                                    <button ref="addfriendbutton" type="submit"
                                        class="button bg-primary text-xs text-primary dark:text-white"
                                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Add friend
                                    </button>
                                </form>
                            </div>

                            <button class="bg-secondery button w-full mt-2 hidden">See all</button>

                        </div>

                    </div> -->

                    <!-- peaple you might know -->
                    <SuggestedPeople :suggested-people="suggestedPeople" />

                    <!-- latest marketplace items -->
                    <div class="box p-5 px-6 border1 dark:bg-dark2">

                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> Premium Photos </h3>
                            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon>
                            </button>
                        </div>

                        <div class="relative capitalize font-medium text-sm text-center mt-4 mb-2" tabindex="-1"
                            uk-slider="autoplay: true;finite: true">

                            <div class="overflow-hidden uk-slider-container">

                                <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]">

                                    <li class="w-1/2 pr-2">

                                        <a href="#">
                                            <div class="relative overflow-hidden rounded-lg">
                                                <div class="relative w-full h-40">
                                                    <img src="/images/product/product-1.jpg" alt=""
                                                        class="object-cover w-full h-full inset-0">
                                                </div>
                                                <div
                                                    class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60">
                                                    $12 </div>
                                            </div>
                                            <div class="mt-3 w-full"> Chill Lotion </div>
                                        </a>
                                    </li>
                                    <li class="w-1/2 pr-2">

                                        <a href="#">
                                            <div class="relative overflow-hidden rounded-lg">
                                                <div class="relative w-full h-40">
                                                    <img src="/images/product/product-3.jpg" alt=""
                                                        class="object-cover w-full h-full inset-0">
                                                </div>
                                                <div
                                                    class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60">
                                                    $18 </div>
                                            </div>
                                            <div class="mt-3 w-full"> Gaming mouse </div>
                                        </a>

                                    </li>
                                    <li class="w-1/2 pr-2">

                                        <a href="#">
                                            <div class="relative overflow-hidden rounded-lg">
                                                <div class="relative w-full h-40">
                                                    <img src="/images/product/product-5.jpg" alt=""
                                                        class="object-cover w-full h-full inset-0">
                                                </div>
                                                <div
                                                    class="absolute right-0 top-0 m-2 bg-white/60 rounded-full py-0.5 px-2 text-sm font-semibold dark:bg-slate-800/60">
                                                    $12 </div>
                                            </div>
                                            <div class="mt-3 w-full"> Herbal Shampoo </div>
                                        </a>

                                    </li>

                                </ul>

                                <button type="button"
                                    class="absolute bg-white rounded-full top-16 -left-4 grid w-9 h-9 place-items-center shadow dark:bg-dark3"
                                    uk-slider-item="previous"> <ion-icon name="chevron-back"
                                        class="text-2xl"></ion-icon></button>
                                <button type="button"
                                    class="absolute -right-4 bg-white rounded-full top-16 grid w-9 h-9 place-items-center shadow dark:bg-dark3"
                                    uk-slider-item="next"> <ion-icon name="chevron-forward"
                                        class="text-2xl"></ion-icon></button>

                            </div>

                        </div>


                    </div>

                    <!-- online friends -->
                    <div class="box p-5 px-6 border1 dark:bg-dark2">

                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> Online Friends </h3>
                            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon>
                            </button>
                        </div>

                        <div class="grid grid-cols-6 gap-3 mt-4">

                            <a href="timeline.html">
                                <div class="w-10 h-10 relative">
                                    <img src="/images/avatars/avatar-2.jpg" alt=""
                                        class="w-full h-full absolute inset-0 rounded-full">
                                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2">
                                    </div>
                                </div>
                            </a>
                            <a href="timeline.html">
                                <div class="w-10 h-10 relative">
                                    <img src="/images/avatars/avatar-3.jpg" alt=""
                                        class="w-full h-full absolute inset-0 rounded-full">
                                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2">
                                    </div>
                                </div>
                            </a>
                            <a href="timeline.html">
                                <div class="w-10 h-10 relative">
                                    <img src="/images/avatars/avatar-4.jpg" alt=""
                                        class="w-full h-full absolute inset-0 rounded-full">
                                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2">
                                    </div>
                                </div>
                            </a>
                            <a href="timeline.html">
                                <div class="w-10 h-10 relative">
                                    <img src="/images/avatars/avatar-5.jpg" alt=""
                                        class="w-full h-full absolute inset-0 rounded-full">
                                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2">
                                    </div>
                                </div>
                            </a>
                            <a href="timeline.html">
                                <div class="w-10 h-10 relative">
                                    <img src="/images/avatars/avatar-6.jpg" alt=""
                                        class="w-full h-full absolute inset-0 rounded-full">
                                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2">
                                    </div>
                                </div>
                            </a>
                            <a href="timeline.html">
                                <div class="w-10 h-10 relative">
                                    <img src="/images/avatars/avatar-7.jpg" alt=""
                                        class="w-full h-full absolute inset-0 rounded-full">
                                    <div class="absolute bottom-0 right-0 m-0.5 bg-green-500 rounded-full w-2 h-2">
                                    </div>
                                </div>
                            </a>

                        </div>


                    </div>

                    <!-- Pro Members -->
                    <div class="box p-5 px-6 border1 dark:bg-dark2">
                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> Pro Members </h3>
                        </div>

                        <div class="relative capitalize font-normal text-sm mt-4 mb-2" tabindex="-1"
                            uk-slider="autoplay: true;finite: true">
                            <div class="overflow-hidden uk-slider-container">
                                <ul class="-ml-2 uk-slider-items w-[calc(100%+0.5rem)]">
                                    <li class="w-1/2 pr-2">
                                        <a href="timeline.html">
                                            <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                                <a href="timeline.html">
                                                    <div class="relative w-16 h-16 mx-auto mt-2">
                                                        <img src="/images/avatars/avatar-5.jpg" alt=""
                                                            class="h-full object-cover rounded-full shadow w-full">
                                                    </div>
                                                </a>
                                                <div class="mt-5 text-center w-full">
                                                    <a href="timeline.html">
                                                        <h5 class="font-semibold">Martin Gray</h5>
                                                    </a>
                                                    <div class="text-xs text-gray-400 mt-0.5 font-medium">12K
                                                        Followers</div>
                                                    <button type="button"
                                                        class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1">Follow</button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="w-1/2 pr-2">
                                        <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                            <a href="timeline.html">
                                                <div class="relative w-16 h-16 mx-auto mt-2">
                                                    <img src="/images/avatars/avatar-4.jpg" alt=""
                                                        class="h-full object-cover rounded-full shadow w-full">
                                                </div>
                                            </a>
                                            <div class="mt-5 text-center w-full">
                                                <a href="timeline.html">
                                                    <h5 class="font-semibold">Alexa Park</h5>
                                                </a>
                                                <div class="text-xs text-gray-400 mt-0.5 font-medium">12K
                                                    Followers</div>
                                                <button type="button"
                                                    class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1">Follow</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="w-1/2 pr-2">
                                        <div class="flex flex-col items-center shadow-sm p-2 rounded-xl border1">
                                            <a href="timeline.html">
                                                <div class="relative w-16 h-16 mx-auto mt-2">
                                                    <img src="/images/avatars/avatar-4.jpg" alt=""
                                                        class="h-full object-cover rounded-full shadow w-full">
                                                </div>
                                            </a>
                                            <div class="mt-5 text-center w-full">
                                                <a href="timeline.html">
                                                    <h5 class="font-semibold">James Lewis</h5>
                                                </a>
                                                <div class="text-xs text-gray-400 mt-0.5 font-medium">15K
                                                    Followers</div>
                                                <button type="button"
                                                    class="bg-secondery block font-semibold mt-4 py-1.5 rounded-lg text-sm w-full border1">Follow</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <button type="button"
                                    class="absolute -translate-y-1/2 bg-slate-100 rounded-full top-1/2 -left-4 grid w-9 h-9 place-items-center dark:bg-dark3"
                                    uk-slider-item="previous">
                                    <ion-icon name="chevron-back" class="text-2xl"></ion-icon>
                                </button>
                                <button type="button"
                                    class="absolute -right-4 -translate-y-1/2 bg-slate-100 rounded-full top-1/2 grid w-9 h-9 place-items-center dark:bg-dark3"
                                    uk-slider-item="next">
                                    <ion-icon name="chevron-forward" class="text-2xl"></ion-icon>
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Trends -->
                    <div class="box p-5 px-6 border1 dark:bg-dark2">

                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base"> Trends for you </h3>
                            <button type="button"> <ion-icon name="sync-outline" class="text-xl"></ion-icon>
                            </button>
                        </div>

                        <div
                            class="space-y-3.5 capitalize text-xs font-normal mt-5 mb-2 text-gray-600 dark:text-white/80">
                            <a href="#">
                                <div class="flex items-center gap-3 p">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                    </svg>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-black dark:text-white text-sm"> artificial
                                            intelligence </h4>
                                        <div class="mt-0.5"> 1,245,62 post </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                    </svg>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-black dark:text-white text-sm"> Web
                                            developers</h4>
                                        <div class="mt-0.5"> 1,624 post </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                    </svg>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-black dark:text-white text-sm"> Ui
                                            Designers</h4>
                                        <div class="mt-0.5"> 820 post </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 -mt-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                    </svg>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-black dark:text-white text-sm"> affiliate
                                            marketing </h4>
                                        <div class="mt-0.5"> 480 post </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>

                </div>
            </div>

        </div>



    </AuthenticatedLayout>



</template>
