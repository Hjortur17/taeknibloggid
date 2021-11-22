<template>
    <div class="space-y-4">
        <img :src="post.img_url" :alt="post.title" class="w-full h-44 rounded object-center object-center object-cover">

        <div class="w-full space-y-4">
            <Link :href="'/pistlar/' + post.slug" class="text-2xl w-full link"><h2>{{ post.title }}</h2></Link>
            <p class="w-full" v-if="post.content.length >= 200">{{ post.content.substring(0,200) + "..." }}</p>
            <p class="w-full" v-else>{{ post.content }}</p>

            <div class="flex space-x-4" v-for="tag in post.tags">
                <Link :href="'/pistlar?flokkur=' + tag.title" class="uppercase text-sm font-bold text-purple-700 hover:text-purple-300 transition-all duration-200 cursor-pointer">#{{ tag.title }}</Link>
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
