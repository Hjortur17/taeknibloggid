<template>
    <div class="flex flex-col md:flex-row space-x-0 md:space-x-12 space-y-6 md:space-y-0">
        <img :src="post.image.url" :alt="post.title" class="w-full md:w-1/2 h-48 md:h-96 shadow rounded object-center object-center object-cover select-none">

        <div class="w-full md:w-1/2 grid grid-cols-1 content-between space-y-4">
            <Link :href="'/bloggið/' + post.slug" class="text-3xl md:text-4xl leading-8 md:leading-10 w-full link"><h1>{{ post.title }}</h1></Link>

            <div class="flex items-center space-x-4 py-2 md:py-0">
                <img src="css/images/me.png" alt="Animoji of me" class="w-12 md:w-14 h-12 md:h-14 select-none">
                <div>
                    <h3 class="text-sm md:text-base">{{ post.author.name }}</h3>
                    <small class="text-xs md:text-base">Skrifað þann <span class="capitalize">{{ post.created_at }}</span></small>
                </div>
            </div>

            <p class="w-full" v-if="post.content.length >= 400" v-html="markdownToHtml"></p>
            <p class="w-full" v-else>{{ post.content }}</p>

            <div class="flex space-x-4" v-for="tag in post.tags">
                <Link :href="'/bloggið?flokkur=' + tag.title" class="tag" :class="'bg-' + tag.color + '-200 text-' + tag.color + '-600 hover:text-' + tag.color + '-900'">#{{ tag.title }}</Link>
            </div>
        </div>
    </div>
</template>

<script>
import { marked } from 'marked';

export default {
    name: "Large Preview",
    props: ['post'],

    computed: {
        markdownToHtml(){
            return marked(this.post.content.substring(0,400) + "...");
        }
    }
}
</script>
