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
                    <label v-text="'#' + tag.title" :for="tag.title" class="tag" :class="'bg-' + tag.color + '-200 text-' + tag.color + '-700 hover:text-' + tag.color + '-900'"></label>
                </div>
                <a class="pl-6 uppercase text-sm text-light hover:text-darker duration-300 ease-in-out font-bold cursor-pointer" v-show="filters.flokkur !== null" @click="clearSort()">Hreinsa</a>
            </div>


            <div>
                <input v-model="search" type="text" placeholder="Leita..." class="float-right border px-2 rounded">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-2 gap-8">
            <small-preview v-for="post in posts" :key="post.title" :post="post"></small-preview>
        </div>
    </section>
</template>

<script>
import {throttle} from "lodash/function";
import LargePreview from "../../Shared/Previews/Large";
import SmallPreview from "../../Shared/Previews/Small";

export default {
    name: 'Posts',

    components: {LargePreview, SmallPreview},

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
