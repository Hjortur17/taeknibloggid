<template>
    <Head>
        <title>Heim</title>
        <meta type="description" content="Information from the homepage" head-key="description">
    </Head>

    <nav class="max-w-screen-xl mx-auto flex items-center pb-16">
        <div class="flex-1">
            <Link href="/" class="text-2xl uppercase link"><h1>THjálp.is</h1></Link>
        </div>
        <div class="flex-1">
            <ul class="flex space-x-6 justify-end">
                <li>
                    <Link href="/pistlar" class="text-lg link">Pistlar</Link>
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
