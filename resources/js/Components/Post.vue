<script setup>
import { Link, usePage, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
const props = defineProps({
    post: {
        type: Object
    },
    can: {
        type: Array
    }
})

const user = usePage().props.auth.user;
const comment_body = ref('');

const edit_comment_body = ref('');



const comment = () => {
    axios.post(route('comment.store'), {
        body: comment_body.value,
        post_id: props.post.id
    }).then(res => {
        comment_body.value = '';
        props.post.comments_count = res.data.comments_count;
        props.post.comments = res.data.comments.data;
    })
};


const delete_comment = (comment_id) => {
    axios.delete(route('comment.destroy', comment_id)).then(res => {
        const index = props.post.comments.findIndex(comment => comment.id === comment_id);
        if (index !== -1) {
            props.post.comments.splice(index, 1);
            props.post.comments_count -= 1;
            const dropdownElement = document.getElementById('comment-dropdown-' + comment_id);
            if (dropdownElement) {
                UIkit.dropdown(dropdownElement).hide(0);
                document.getElementById('edit_comment_body').focus();
            }
        }
    })
}

let current_comment_id = null;

const edit_comment = (comment) => {
    edit_comment_body.value = comment.body;
    current_comment_id = comment.id;
    const dropdownElement = document.getElementById('comment-dropdown-' + comment.id);
    if (dropdownElement) {
        UIkit.dropdown(dropdownElement).hide(0);
        document.getElementById('edit_comment_body').focus();
    }

}

const update_comment = () => {
    if (current_comment_id) {
        axios.put(route('comment.update', current_comment_id), {
            body: edit_comment_body.value
        }).then(res => {
            const comment = props.post.comments.find(comment => comment.id === current_comment_id);
            if (comment) {
                comment.body = edit_comment_body.value;
                edit_comment_body.value = '';
            }
            current_comment_id = null;
            UIkit.modal('#edit-comment-modal').hide();

        })
    }
}


const delete_form = useForm({});
const delete_post = (post_id) => {
    delete_form.delete(route('post.destroy', post_id), {
        onSuccess: () => {
        }
    })
}


const like = () => {
    axios.post(route('like.store'), {
        post_id: props.post.id
    }).then(res => {
        props.post.isLiked = res.data.is_liked;
        props.post.likes_count = res.data.likes_count;
    })

}

</script>


<template>
    <!--  post image with slider-->
    <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

        <!-- post heading -->
        <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
            <Link :href="route('profile.show', post.user.id)"> <img src="/images/avatars/avatar-3.jpg" alt=""
                class="w-9 h-9 rounded-full"> </Link>
            <div class="flex-1">
                <Link :href="route('profile.show', post.user.id)">
                <h4 class="text-black dark:text-white">{{ post.user.name }}</h4>
                </Link>
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
                        <a v-if="user.id != post.user.id" href="#"
                            class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                            <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>
                            Unfollow </a>

                        <a v-if="user.id == post.user.id" @click="delete_post(post.id)" href="#"
                            class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                            <ion-icon class="text-xl shrink-0" name="trash-outline"></ion-icon>
                            Delete Post </a>
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
        <div v-if="post.comments.length"
            class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">

            <div v-for="comment in post.comments" class="flex items-start gap-3 relative">
                <Link :href="route('profile.show', comment.user.id)"> <img src="/images/avatars/avatar-2.jpg" alt=""
                    class="w-6 h-6 mt-1 rounded-full"> </Link>
                <div class="flex-1">
                    <Link :href="route('profile.show', comment.user.id)"
                        class="text-black font-medium inline-block dark:text-white">
                    {{ comment.user.name }} </Link>
                    <p class="mt-0.5">{{ comment.body }}</p>
                </div>
                <div class="-mr-1">
                    <button type="button" class="button-icon w-6 h-6"> <ion-icon class="text-xl"
                            name="ellipsis-horizontal"></ion-icon> </button>
                    <div :id="'comment-dropdown-' + comment.id" class="w-[180px]"
                        uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                        <nav>
                            <a @click.prevent="edit_comment(comment)" v-if="user.id == comment.user.id" href="#"
                                uk-toggle="target: #edit-comment-modal" tabindex="0" aria-expanded="false">
                                <ion-icon class="shrink-0" name="create-outline"></ion-icon>
                                Edit</a>
                            <hr>
                            <a v-if="user.id == comment.user.id" @click.prevent="delete_comment(comment.id)" href="#"
                                class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50">
                                <ion-icon class="shrink-0" name="trash-outline"></ion-icon>
                                Delete</a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                <ion-icon name="chevron-down-outline"
                    class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                More Comment
            </button> -->

        </div>

        <form @submit.prevent="comment">
            <!-- add comment -->
            <div
                class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">

                <img src="/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">

                <div class="flex-1 relative overflow-hidden h-10">

                    <textarea placeholder="Add Comment...." rows="1"
                        class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"
                        v-model="comment_body" @keydown.enter.exact.prevent="comment" required min="1"
                        id="body_textarea"></textarea>

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


                <button type="submit" class="flex items-center">
                    <ion-icon class="text-2xl" name="arrow-forward-circle-outline"></ion-icon></button>
            </div>
        </form>

    </div>



    <!-- edit comment -->
    <div class="hidden lg:p-20 uk- open" id="edit-comment-modal" uk-modal="">

        <div
            class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

            <div class="text-center py-4 border-b mb-0 dark:border-slate-700">
                <h2 class="text-sm font-medium text-black">Edit Comment </h2>

                <!-- close button -->
                <button type="button" class="button-icon absolute top-0 right-0 m-2.5 uk-modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>

            <div class="space-y-5 mt-3 p-2">
                <textarea
                    class="w-full !text-black placeholder:!text-black !bg-white !border-transparent focus:!border-transparent focus:!ring-transparent !font-normal !text-xl   dark:!text-white dark:placeholder:!text-white dark:!bg-slate-800"
                    v-model="edit_comment_body" id="edit_comment_body" rows="6" autofocus
                    placeholder="What do you have in mind?">
                </textarea>

            </div>
            <div class="p-5 flex justify-between items-center">
                <div>
                </div>
                <div class="flex items-center gap-2">
                    <button @click="update_comment(current_comment_id)"
                        class="button bg-blue-500 text-white py-2 px-12 text-[14px]">
                        Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit comment -->

</template>
