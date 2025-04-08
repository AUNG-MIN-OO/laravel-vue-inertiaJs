<script setup>
import {useForm} from "@inertiajs/vue3";
import {route} from "ziggy-js";
import TextInput from "@/Pages/Components/TextInput.vue";

const form = useForm({
    email : null,
    password : null,
    remember : null,
})

const submit = () => {
    form.post(route('login'),{
        onError  : ()=> form.reset('password','remember')
    })
}
</script>

<template>
    <Head title="Login"/>

    <h1 class="title">Login to your account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email"/>

            <TextInput name="password" v-model="form.password" :message="form.errors.password"/>

            <div class="flex justify-between items-center mb-2">
                <div class="flex justify-between items-center gap-2">
                    <label for="remember">Remember me</label>
                    <input type="checkbox" v-model="form.remember" id="remember">
                </div>
                <p class="text-slate-600">Not yet registered?
                    <Link :href="route('register')" class="text-link">Register</Link>
                </p>
            </div>

            <div class="">
                <button class="primary-btn" :disabled="form.processing">Login</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
