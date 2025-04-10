<script setup>

import {route} from "ziggy-js";
import PaginationLinks from "@/Pages/Components/PaginationLinks.vue";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import {throttle} from "lodash";

const props = defineProps({
    users : Object,
    searchKey : String,
    can : Object,
})

const search = ref(props.searchKey);

watch(search,
    throttle((s)=>router.get('/',{search : s}, {preserveState: true})
    ,1000)
);

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
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="Search ..." v-model="search">
            </div>
        </div>
        <table>
            <thead>
            <tr class="bg-slate-300">
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th v-if="can.delete_user">Delete</th>
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
                <td v-if="can.delete_user">
                    <button class="bg-red-600 w-6 h-6 rounded-full">
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
<!--        pagination links-->
        <PaginationLinks :users="users"/>


    </div>
</template>

<style scoped>

</style>
