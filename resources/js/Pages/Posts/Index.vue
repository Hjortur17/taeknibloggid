<template>
    <Head>
        <title>Bloggið</title>
        <meta type="description" content="Information from the homepage" head-key="description">
    </Head>

    <div class="pt-36 md:p-0"></div>

    <section class="h-screen flex flex-wrap content-center max-w-screen-xl mx-auto px-6">
        <large-preview :post="posts[0]"></large-preview>

        <div class="flex space-x-6 mt-16">
            <div class="flex" v-for="tag in tags">
                <Link :href="'?flokkur=' + tag.title" v-text="'#' + tag.title" class="tag" :class="'text-' + tag.color + '-600 hover:text-' + tag.color + '-900'"></Link>
            </div>

            <input v-model="search" type="text" placeholder="Leita..." class="border px-2 rounded">
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
        filters: Object
    },

    data() {
        return {
            search: this.filters.search
        }
    },

    watch: {
        search: throttle(function (value) {
            this.$inertia.get('/bloggið', {leita: value}, {
                preserveState: true,
                replace: true
            });
        }, 500)
    }
}
</script>
