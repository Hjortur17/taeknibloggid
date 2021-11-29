<template>
    <Head>
        <title>Bloggið</title>
        <meta type="description" content="Information from the homepage" head-key="description">
    </Head>

    <div class="pt-36"></div>

    <section class="min-h-screen h-full flex flex-wrap content-center max-w-screen-xl mx-auto px-6">
        <div class="w-full flex justify-between my-16">
            <div class="flex items-center space-x-4">
                <div class="radio-button" v-for="tag in tags">
                    <input type="radio" v-model="sort" :id="tag.title" :value="tag.title"/>
                    <label v-text="'#' + tag.title" :for="tag.title" class="tag"
                           :class="'bg-' + tag.color + '-200 text-' + tag.color + '-700 hover:text-' + tag.color + '-900'"></label>
                </div>
                <a class="pl-6 uppercase text-sm text-light hover:text-darker duration-300 ease-in-out font-bold cursor-pointer"
                   v-show="sort" @click="clearSort()">Hreinsa</a>
            </div>


            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5"><!-- Font Awesome Pro 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path
                            d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"/></svg>
                    </button>
                </span>

                <input v-model="search" type="search"
                       class="py-2 text-sm border-2 border-lighter bg-lighter rounded-md pl-10 ease-in-out duration-300 focus:outline-none focus:border-primary focus:bg-normal"
                       placeholder="Leita..." autocomplete="off">

                <span class="absolute inset-y-0 right-0 flex items-center pr-2" v-show="search">
                    <button type="submit"
                            class="p-1 text-gray-500 fill-current focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"><!-- Font Awesome Pro 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"/></svg>
                    </button>
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-2 gap-8">
            <small-preview v-for="post in posts.data" :key="post.title" :post="post"></small-preview>
        </div>

        <Pagination :links="posts.links" />
    </section>
</template>

<script>
import {throttle} from "lodash/function";
import LargePreview from "../../Shared/Previews/Large";
import SmallPreview from "../../Shared/Previews/Small";
import Pagination from "../../Shared/Pagination";

export default {
    name: 'Posts',

    components: {LargePreview, SmallPreview, Pagination},

    props: {
        posts: Object,
        tags: Object,
        filters: Object,
    },

    data() {
        return {
            search: this.filters.search,
            sort: this.filters.sort,
            author: this.filters.author
        }
    },

    watch: {
        search: throttle(function (value) {
            this.$inertia.get('/bloggið', {leita: value}, {
                preserveState: true,
                replace: true
            });
        }, 500),

        sort: throttle(function (value) {
            this.$inertia.get('/bloggið', {flokkur: value}, {
                preserveState: true,
                replace: true
            });
        }, 500),

        author: throttle(function (value) {
            this.$inertia.get('/bloggið', {höfundur: value}, {
                preserveState: true,
                replace: true
            });
        }, 500)
    }
}
</script>

<style scoped>
.radio-button input[type="radio"] {
    opacity: 0;
    position: fixed;
    width: 0;
}
</style>
