<script setup>

import {route} from "ziggy-js";
import PaginationLinks from "@/Pages/Components/PaginationLinks.vue";

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
        <PaginationLinks :users="users"/>


    </div>
</template>

<style scoped>

</style>
