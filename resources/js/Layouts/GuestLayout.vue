<template>
    <div class="sm:flex">

        <div
            class="relative lg:w-[580px] md:w-96 w-full p-10 min-h-screen md:max-h-screen bg-white shadow-xl flex items-center pt-10 dark:bg-slate-900 z-10">

            <div class="w-full lg:max-w-sm mx-auto space-y-10"
                uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">

                <!-- logo image-->
                <!-- <a href="#"> <img src="/images/output.svg" class="w-28 absolute left-12 top-1 dark:hidden" alt=""></a>
                <a href="#"> <img src="/images/output.svg" class="w-28 absolute left-12 top-1 hidden dark:!block"
                        alt=""></a> -->

                <!-- logo icon optional -->
                <div class="">
                    <img class="w-12" src="/images/output.svg" alt="Socialite html template">
                </div>

                <slot />
            </div>

        </div>

        <!-- image slider -->
        <div class="flex-1 relative bg-primary max-md:hidden">


            <div class="relative w-full h-full" tabindex="-1" uk-slideshow="animation: slide; autoplay: true">

                <ul class="uk-slideshow-items w-full h-full">
                    <li class="w-full">
                        <img src="/images/auth/landscape.jpg" alt=""
                            class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                        <div class="absolute bottom-0 w-full uk-tr ansition-slide-bottom-small z-10">
                            <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative"
                                uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                                <!-- <img class="w-12" src="/images/output.svg" alt="Socialite html template"> -->
                                <h4 class="!text-white text-2xl font-semibold mt-7" uk-slideshow-parallax="y: 600,0,0">
                                    Connect With Friends </h4>
                                <p class="!text-white text-lg mt-7 leading-8" uk-slideshow-parallax="y: 800,0,0;"> This
                                    phrase is more casual and playful. It suggests that you are keeping your friends
                                    updated on what’s happening in your life.</p>
                            </div>
                        </div>
                        <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                    </li>
                    <li class="w-full">
                        <img src="/images/auth/landscape_2.jpg" alt=""
                            class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                        <div class="absolute bottom-0 w-full uk-tr ansition-slide-bottom-small z-10">
                            <div class="max-w-xl w-full mx-auto pb-32 px-5 z-30 relative"
                                uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                                <!-- <img class="w-12" src="/images/output.svg" alt="Socialite html template"> -->
                                <h4 class="!text-white text-2xl font-semibold mt-7" uk-slideshow-parallax="y: 800,0,0">
                                    Connect With Friends </h4>
                                <p class="!text-white text-lg mt-7 leading-8" uk-slideshow-parallax="y: 800,0,0;"> This
                                    phrase is more casual and playful. It suggests that you are keeping your friends
                                    updated on what’s happening in your life.</p>
                            </div>
                        </div>
                        <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                    </li>
                </ul>

                <!-- slide nav -->
                <div class="flex justify-center">
                    <ul
                        class="inline-flex flex-wrap justify-center  absolute bottom-8 gap-1.5 uk-dotnav uk-slideshow-nav">
                    </ul>
                </div>


            </div>


        </div>

    </div>

</template>
