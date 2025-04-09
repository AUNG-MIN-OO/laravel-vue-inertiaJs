<script setup>

import {route} from "ziggy-js";

defineProps({
    users : Object
})

const formatDate = (dateStr) => {
    const date = new Date(dateStr)
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
};

</script>

<template>
    <Head :title="$page.component"/>

    <div>
        <table>
            <thead>
            <tr class="bg-slate-300">
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users.data" :key="user.id">
                <td>
                    <img :src="user.avatar ? ('Storage/'+user.avatar) : ('Storage/avatars/default.png')" class="avatar" alt="">
                </td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{formatDate(user.created_at)}}</td>
            </tr>
            </tbody>
        </table>
<!--        pagination links-->
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


    </div>
</template>

<style scoped>

</style>
