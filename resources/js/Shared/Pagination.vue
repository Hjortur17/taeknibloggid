<template>
    <div class="w-full flex items-center justify-center space-x-4 pt-16">
        <component
            :is="link.url ? 'link' : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            :class="link.url ? '' : 'text-gray-300'"
        />
    </div>

<!--    <div class="flex flex-col items-center my-12 w-full justify-center">-->
<!--        <div class="flex text-gray-700">-->
<!--            <div class="h-8 w-8 mr-1 flex justify-center items-center cursor-pointer">-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"-->
<!--                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"-->
<!--                     class="feather feather-chevron-left w-4 h-4">-->
<!--                    <polyline points="15 18 9 12 15 6"></polyline>-->
<!--                </svg>-->
<!--            </div>-->
<!--            <div class="flex h-8 font-medium" v-for="link in links">-->
<!--                <Link class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in border-t-2 border-transparent" :href="link.url" v-html="link.label" />-->
<!--            </div>-->
<!--            <div class="h-8 w-8 ml-1 flex justify-center items-center  cursor-pointer">-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"-->
<!--                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"-->
<!--                     class="feather feather-chevron-right w-4 h-4">-->
<!--                    <polyline points="9 18 15 12 9 6"></polyline>-->
<!--                </svg>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>

<script>
export default {
    name: "Pagination",
    props: ['links']
}
</script>
