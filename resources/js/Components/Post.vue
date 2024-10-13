<script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
    post: {
        type: Object
    }
})


const form = useForm({
    body: '',
    post_id: props.post.id
})

const likeForm = useForm({
    post_id: props.post.id,
})


const comment = () => {

    form.post(route('comment.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.body = '';
        },
    });
};


const like = () => {
    likeForm.post(route('like.store'), {
        preserveScroll: true
    });

}

</script>


<template>
    <!--  post image with slider-->
    <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

        <!-- post heading -->
        <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
            <a href="timeline.html"> <img src="/images/avatars/avatar-3.jpg" alt="" class="w-9 h-9 rounded-full"> </a>
            <div class="flex-1">
                <a href="timeline.html">
                    <h4 class="text-black dark:text-white">{{ post.user.name }}</h4>
                </a>
                <div class="text-xs text-gray-500 dark:text-white/80">{{ post.created_at_diff_human }}</div>
            </div>

            <div class="-mr-1">
                <button type="button" class="button-icon w-8 h-8"> <ion-icon class="text-xl"
                        name="ellipsis-horizontal"></ion-icon> </button>
                <div class="w-[245px]"
                    uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                    <nav>
                        <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add to
                            favorites </a>
                        <a href="#"> <ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon>
                            Mute Notification
                        </a>
                        <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>
                            Report this post </a>
                        <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>
                            Share your profile </a>
                        <hr>
                        <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                            <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>
                            Unfollow </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="sm:px-4 p-2.5 pt-0">
            <p class="font-normal">{{ props.post.body }}</p>
        </div>

        <!-- post image -->
        <div v-if="props.post.images" class="relative uk-visible-toggle sm:px-4" tabindex="-1"
            uk-slideshow="animation: push;ratio: 4:3">

            <ul class="uk-slideshow-items overflow-hidden rounded-xl" uk-lightbox="animation: fade">
                <li class="w-full">
                    <a class="inline" href="https://getuikit.com/docs/images/photo3.jpg" data-caption="Caption 1">
                        <img src="/images/post/img-2.jpg" alt="" class="w-full h-full absolute object-cover insta-0">
                    </a>
                </li>
                <li class="w-full">
                    <a class="inline" href="https://getuikit.com/docs/images/photo2.jpg" data-caption="Caption 2">
                        <img src="/images/post/img-3.jpg" alt="" class="w-full h-full absolute object-cover insta-0">
                    </a>
                </li>
                <li class="w-full">
                    <a class="inline" href="https://getuikit.com/docs/images/photo.jpg" data-caption="Caption 3">
                        <img src="/images/post/img-4.jpg" alt="" class="w-full h-full absolute object-cover insta-0">
                    </a>
                </li>
            </ul>

            <a class="nav-prev left-6" href="#" uk-slideshow-item="previous"> <ion-icon name="chevron-back"
                    class="text-2xl"></ion-icon> </a>
            <a class="nav-next right-6" href="#" uk-slideshow-item="next"> <ion-icon name="chevron-forward"
                    class="text-2xl"></ion-icon></a>

        </div>

        <!-- post icons -->
        <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
            <div>
                <d class="flex items-center gap-2.5">
                    <button @click="like" type="button" class="button-icon text-red-500 bg-red-100 dark:bg-slate-700">
                        <ion-icon class="text-lg" :style="{
                            color: post.isLiked ? 'red' : 'transparent',
                            stroke: 'white',
                            strokeWidth: '2',
                            fill: post.isLiked ? 'red' : 'grey'
                        }" name="heart"></ion-icon> </button>

                    <a href="#">{{ post.likes_count }}</a>
                </d iv>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="button-icon bg-slate-200/70 dark:bg-slate-700">
                    <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                <span>{{ post.comments_count }}</span>
            </div>
            <button type="button" class="button-icon ml-auto"> <ion-icon class="text-xl"
                    name="paper-plane-outline"></ion-icon> </button>
            <button type="button" class="button-icon"> <ion-icon class="text-xl" name="share-outline"></ion-icon>
            </button>
        </div>

        <!-- comments -->
        <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">

            <div v-for="comment in post.comments" class="flex items-start gap-3 relative">
                <a href="timeline.html"> <img src="/images/avatars/avatar-2.jpg" alt=""
                        class="w-6 h-6 mt-1 rounded-full"> </a>
                <div class="flex-1">
                    <a href="timeline.html" class="text-black font-medium inline-block dark:text-white">
                        {{ comment.user.name }} </a>
                    <p class="mt-0.5">{{ comment.body }}</p>
                </div>
            </div>
            <!-- <div class="flex items-start gap-3 relative">
                <a href="timeline.html"> <img src="/images/avatars/avatar-3.jpg" alt=""
                        class="w-6 h-6 mt-1 rounded-full"> </a>
                <div class="flex-1">
                    <a href="timeline.html" class="text-black font-medium inline-block dark:text-white">
                        Monroe </a>
                    <p class="mt-0.5"> You captured the moment.😎 </p>
                </div>
            </div> -->

            <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                <ion-icon name="chevron-down-outline"
                    class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                More Comment
            </button>

        </div>

        <form @submit.prevent="comment">
            <!-- add comment -->
            <div
                class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">

                <img src="/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">

                <div class="flex-1 relative overflow-hidden h-10">

                    <textarea placeholder="Add Comment...." rows="1"
                        class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"
                        v-model="form.body" @keydown.enter.exact.prevent="comment" required min="1"></textarea>

                    <div class="!top-2 pr-2" uk-drop="pos: bottom-right; mode: click">
                        <div class="flex items-center gap-2"
                            uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 fill-sky-600">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 fill-pink-600">
                                <path
                                    d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                            </svg>
                        </div>
                    </div>

                </div>


                <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery">
                    Replay</button>
            </div>
        </form>

    </div>
</template>
