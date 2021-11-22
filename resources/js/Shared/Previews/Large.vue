<template>
    <div class="flex space-x-12">
        <div class="w-1/2 grid grid-cols-1 content-between space-y-4">
            <Link :href="'/pistlar/' + post.slug" class="text-4xl leading-10 w-full link"><h2>{{ post.title }}</h2></Link>
            <div class="flex items-center space-x-4">
                <img src="css/images/me.png" alt="" class="w-16 h-16">
                <div>
                    <h4>{{ post.author.name }}</h4>
                    <small>Skrifað þann <span class="capitalize">{{ post.created_at }}</span></small>
                </div>
            </div>
            <p class="w-full" v-if="post.content.length >= 500">{{ post.content.substring(0,500) + "..." }}</p>
            <p class="w-full" v-else>{{ post.content }}</p>

            <div class="flex space-x-4" v-for="tag in post.tags">
                <Link :href="'/pistlar?flokkur=' + tag.title" class="uppercase text-sm font-bold text-purple-700 hover:text-purple-300 transition-all duration-200 cursor-pointer">#{{ tag.title }}</Link>
            </div>
        </div>

        <img :src="post.img_url" :alt="post.title" class="w-1/2 h-96 rounded object-center object-center object-cover">
    </div>
</template>

<script>
export default {
    name: "Large Preview",
    props: ['post'],
}
</script>
