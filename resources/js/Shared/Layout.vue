<template>
    <nav class="max-w-screen-xl mx-auto flex items-center pb-16">
        <div class="flex-1">
            <Link href="/" class="text-2xl uppercase link"><h1>Tæknibloggið</h1></Link>
        </div>
        <div class="flex-1">
            <ul class="flex space-x-6 justify-end">
                <li>
                    <Link href="/bloggið" class="text-lg link">Bloggið</Link>
                </li>
                <li>
                    <Link href="/um-siðuna" class="text-lg link">Um síðuna</Link>
                </li>
            </ul>
        </div>
    </nav>

    <slot></slot>
</template>

<script>
export default {
    name: "Layout"
}
</script>
