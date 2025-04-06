<script setup>

</script>
<template>
    <Head>
        <title>My App</title>
    </Head>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav class="flex items-center justify-between p-4 mx-auto">
                <div class="space-x-6">
                    <Link href="/">Home</Link>
                    <Link href="/about">About</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>
