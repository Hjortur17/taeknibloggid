<template>
    <section class="max-w-screen-xl mx-auto space-y-16">
        <large-preview :post="posts[0]"></large-preview>

        <p>Google AdSense</p>

        <div class="grid grid-cols-4 gap-4">
            <small-preview v-for="post in articles.slice(1)"  :key="post.title" :post="post"></small-preview>
        </div>
    </section>
</template>

<script>
import LargePreview from "../../Shared/Previews/Large";
import SmallPreview from "../../Shared/Previews/Small";

export default {
    name: "Homepage",
    components: { LargePreview, SmallPreview },
    props: ['posts'],

    computed: {
        articles(){
            return Object.values(this.$props.posts)
        }
    }
}
</script>
