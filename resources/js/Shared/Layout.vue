<template>
    <nav class="w-full">
        <div class="flex justify-between items-center w-full max-w-screen-xl mx-auto px-6">
            <div class="flex-1">
                <Link href="/" class="text-2xl md:text-3xl uppercase text-primary"><h1>Tæknibloggið</h1></Link>
            </div>
            <div class="flex-1">
                <ul class="flex space-x-2 md:space-x-12 justify-end items-center">
                    <li>
                        <Link href="/bloggið" class="font-medium text-xs md:text-lg link">Bloggið</Link>
                    </li>
                    <li>
                        <Link href="/um-siðuna" class="font-medium text-xs md:text-lg link">Um síðuna</Link>
                    </li>
                    <li>
                        <a href="mailto:hjorturfreyr@hjorturfreyr.com" class="bg-primary hover:bg-purple-300 px-6 py-2 text-base rounded-full text-purple-100 hover:text-primary font-medium hover:shadow-md transition-all duration-300 cursor-pointer">Hafðu Samband</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <slot></slot>

    <footer class="flex justify-between items-center w-full max-w-screen-xl mx-auto px-6 py-16">
        <div class="flex-1 text-left">
            <Link href="/" class="text-xl uppercase text-primary"><h1>Tæknibloggið</h1></Link>
        </div>

        <div class="flex-1 text-center">
            <ul class="flex space-x-2 md:space-x-12 justify-center items-center">
                <li>
                    <Link href="/bloggið" class="text-xs md:text-base link">Bloggið</Link>
                </li>
                <li>
                    <Link href="/um-siðuna" class="text-xs md:text-base link">Um síðuna</Link>
                </li>
                <li>
                    <a href="mailto:hjorturfreyr@hjorturfreyr.com" class="text-xs md:text-base link">Hafðu Samband</a>
                </li>
            </ul>
        </div>

        <div class="flex-1 text-right">
            <p class="text-sm text-gray-700">© 2021 <a href="https://hjorturfreyr.com" target="_blank" class="link">Hjörtur Freyr</a></p>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Layout"
}
</script>

<style scoped>
    nav {
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0);
        top: 4rem;
    }
</style>
