<template>
    <Head>
        <title>Blogg</title>
        <meta type="description" content="Information from the homepage" head-key="description">
    </Head>

    <section class="max-w-screen-xl mx-auto">
        <div v-if="posts">
            <Preview :post="posts[1]"></Preview>
        </div>
        <div v-else>
            <p>Ekkert fannst</p>
        </div>

        <div class="flex-1 inline-flex space-x-4 py-32">
            <div class="flex" v-for="tag in tags">
                <Link :href="'?flokkur=' + tag.title" v-text="tag.title" class="capitalize"></Link>
            </div>

            <input v-model="search" type="text" placeholder="Leita..." class="border px-2 rounded">
        </div>
    </section>
</template>

<script>
import {throttle} from "lodash/function";
import Preview from "../../Shared/Previews/Large";

export default {
    name: 'Posts',

    components: { Preview },

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
            this.$inertia.get('/pistlar', {leita: value}, {
                preserveState: true,
                replace: true
            });
        }, 500)
    }
}
</script>
