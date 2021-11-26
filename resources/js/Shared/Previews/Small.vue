<template>
    <div class="space-y-4">
        <img :src="post.image.url" :alt="post.title" class="w-full h-52 rounded object-center object-center object-cover">

        <div class="w-full space-y-4">
            <Link :href="'/bloggið/' + post.slug" class="text-2xl w-full link"><h2>{{ post.title }}</h2></Link>
            <p class="w-full" v-if="post.content.length >= 200">{{ post.content.substring(0,200) + "..." }}</p>
            <p class="w-full" v-else>{{ post.content }}</p>

            <div class="flex space-x-4" v-for="tag in post.tags">
                <Link :href="'/bloggið?flokkur=' + tag.title" class="tag" :class="'text-' + tag.color + '-600 hover:text-' + tag.color + '-900'">#{{ tag.title }}</Link>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: "Small Preview",
    props: ['post'],
}
</script>
