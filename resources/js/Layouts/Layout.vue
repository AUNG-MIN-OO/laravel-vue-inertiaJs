<script setup>

import {route} from "ziggy-js";
</script>
<template>
    <Head>
        <title>My App</title>
    </Head>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('register')" class="nav-link">Register</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>
