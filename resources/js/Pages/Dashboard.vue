<template>
    <div>
        <div v-if="$page.props.flash.greet">
            <p class="p-4 bg-green-400">{{$page.props.flash.greet}}</p>
        </div>
        <h1 class="title ">Welcome back {{$page.props.auth.user.name}}</h1>
    </div>
</template>
<script setup lang="ts">
</script>
