<script setup>
    defineProps({
        user : String
    })
</script>
<template>
    <Head title="About"/>

    <div>this is About {{user}}</div>
</template>
