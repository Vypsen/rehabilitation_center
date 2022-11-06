<template>
    <div class="flex min-h-full items-center justify-center pt-5 pb-12 px-4 sm:px-6 lg:px-8"
         :style="image">
        <div class="w-full max-w-md space-y-5">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default{
    name: 'Login',
    data() {
        return {
            image: { backgroundImage: "url(https://cs4.pikabu.ru/post_img/big/2014/07/23/6/1406104518_948040149.jpg)" }
        };
    }
}
</script>
