<template>
    <Head>
        <title>{{ post.title }}</title>
        <meta type="description" content="Information from the homepage" head-key="description">
    </Head>

    <div class="pt-36 md:pt-40"></div>

    <article class="max-w-screen-xl mx-auto px-6 md:px-0">
        <header class="max-w-screen-lg mx-auto">
            <h1 class="text-center text-4xl md:text-5xl font-black leading-tight">{{ post.title }}</h1>

            <div class="flex space-x-4 items-center justify-center py-8">
                <div class="w-auto">
                    <img src="/css/images/me.png" alt="Animoji of me" class="w-12 md:w-14 h-12 md:h-14">
                </div>
                <div class="w-auto">
                    <Link :href="'/bloggið?höfundur=' + post.author.name" class="link">
                        <h3 class="text-sm md:text-base">{{ post.author.name }}</h3>
                    </Link>
                    <p class="text-xs md:text-base">Skrifað þann <span class="capitalize">{{ post.created_at }}</span>
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-center" v-for="tag in post.tags">
                <Link :href="'/bloggið?flokkur=' + tag.title" class="tag"
                      :class="'bg-' + tag.color + '-200 text-' + tag.color + '-700 hover:text-' + tag.color + '-900'">
                    #{{ tag.title }}
                </Link>
            </div>
        </header>

        <section class="w-full text-right space-y-4 py-4 md:py-8">
            <img :src="post.images[0].url" alt=""
                 class="w-full image-height object-cover object-center select-none rounded-lg">
            <small class="uppercase text-gray-500 text-xs link"><a :href="post.images[0].author_url" target="_blank"> ©
                {{ post.images[0].author_name }}, Unsplash</a></small>
        </section>

        <section class="max-w-screen-lg mx-auto whitespace-pre-line text-justify" v-html="markdownToHtml"></section>
    </article>
</template>

<script>
import {marked} from 'marked';

export default {
    name: "Post",
    props: {
        post: Object
    },

    computed: {
        markdownToHtml() {
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

@media (max-width: 768px) {
    section >>> ul {
        line-height: 24px !important;
    }

    section >>> ol {
        line-height: 24px !important;
    }

    section >>> p {
        font-size: 1rem;
        line-height: 1.5rem;
    }
}
</style>
