<template>
    <article class="max-w-screen-xl mx-auto">
        <header class="max-w-screen-lg mx-auto">
            <h1 class="text-center text-5xl font-black leading-tight pb-6">{{ post.title }}</h1>

            <div class="flex space-x-4 items-center justify-center py-4">
                <div class="w-auto">
                    <img src="/css/images/me.png" alt="Animoji of me" class="w-16 h-16">
                </div>
                <div class="w-auto">
                    <h3>{{ post.author.name }}</h3>
                    <p>Skrifað þann <span class="capitalize">{{ post.created_at }}</span></p>
                </div>
            </div>

            <div class="flex items-center justify-center" v-for="tag in post.tags">
                <Link :href="'/pistlar?flokkur=' + tag.title" class="uppercase text-sm font-bold text-purple-700 hover:text-purple-300 transition-all duration-200 cursor-pointer">#{{ tag.title }}</Link>
            </div>
        </header>

        <section class="w-full py-16 text-right space-y-4">
            <img :src="post.img_url" alt="" class="w-full image-height object-cover object-center select-none">
            <small class="uppercase text-gray-500 text-xs link"><a :href="post.img_url"> © {{ post.img_author }}, Unsplash</a></small>
        </section>

        <section class="max-w-screen-lg mx-auto whitespace-pre-line text-justify" v-html="markdownToHtml"></section>
    </article>
</template>

<script>
import { marked } from 'marked';

export default {
    name: "Post",
    props: {
        post: Object
    },

    computed: {
        markdownToHtml(){
            return marked(this.post.content);
        }
    }
}
</script>

<style scoped>
    .image-height {
        height: 50vh;
    }

    section >>> h2 {
        font-size: 1.5rem;
        line-height: 2rem;
        padding-top: 2rem;
    }

    section >>> p {
        font-size: 1.125rem;
        line-height: 1.75rem;
    }

    section >>> p >>> strong {
        margin-top: 1.5rem !important;
    }

    section >>> ul {
        list-style-type: disc;
        list-style-position: inside;
        line-height: 1;
        font-size: 1rem;
        margin-top: -1.125rem;
    }

    section >>> ol {
        list-style-type: numeric;
        list-style-position: inside;
        line-height: 1;
        font-size: 1rem;
        margin-top: -1.125rem;
    }
</style>
