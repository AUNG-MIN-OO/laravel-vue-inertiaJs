<script setup>
    defineProps({
        users : Object
    })
</script>

<template>
    <div class="flex gap-2">
        <Link
            v-for="link in users.links"
            :key="link.label"
            :href="link.url || '#'"
            v-html="link.label"
            class="px-3 py-1 border rounded text-sm"
            :class="{
            'text-slate-300 pointer-events-none': !link.url,
            'bg-blue-500 text-white': link.active
            }"
            :preserve-scroll="true"
        />
    </div>
</template>

<style scoped>

</style>
