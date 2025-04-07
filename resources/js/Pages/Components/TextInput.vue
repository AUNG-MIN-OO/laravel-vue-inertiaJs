<script setup>
    const model = defineModel({
        type : null,
        required : true
    })
    defineProps({
        name : {
            type : String,
            required : true
        },
        type : {
            type : String,
            default : "text"
        },
        message : String
    })
</script>
<template>
    <div class="mb-6">
        <label :for="name">{{name}}</label>
        <input :type="type" id="name" v-model="model">
        <small class="text-red-600 font-bold" v-if="message">*{{message}}</small>
    </div>
</template>
