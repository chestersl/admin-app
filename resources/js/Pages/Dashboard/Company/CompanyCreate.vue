<script setup>

import {route} from "ziggy-js";
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm, router} from "@inertiajs/vue3";

const props = defineProps({
    csrf: {
        type: String,
        required: true
    },
    errors: {
        type: Object,
        required: true
    }
})

const form = useForm({
    name: '',
    email: '',
    website: '',
    logo: {},
    csrf: props.csrf
})

function formSubmit() {
    form.post(route('company.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('name', 'email', 'website', 'logo')

            router.get(route('company.index'))
        }
    })
}


</script>

<template>
    <AppLayout title="Company create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('dashboard.companies.createAction') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="cover p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form @submit.prevent="formSubmit">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $t('dashboard.companies.form.companyName') }}
                            </label>
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="BMW gmbh." required/>
                            <span v-if="errors.name">{{ errors.name }}</span>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $t('dashboard.companies.form.email') }}
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="admin@admin.com"/>
                                <span v-if="errors.email">{{ errors.email }}</span>
                            </div>
                            <div>
                                <label for="website"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $t('dashboard.companies.form.website') }}
                                </label>
                                <input
                                    v-model="form.website"
                                    type="text"
                                    id="website"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="www.google.com"/>
                                <span v-if="errors.website">{{ errors.website }}</span>
                            </div>
                        </div>
                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                   for="file_input">
                                {{ $t('dashboard.companies.form.uploadFile') }}
                            </label>
                            <input
                                v-on:change="event => {
                                    form.logo = event.target.files[0]
                                }"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help"
                                id="file_input"
                                type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                {{ $t('dashboard.companies.form.types') }}
                            </p>
                            <span v-if="errors.logo">{{ errors.logo }}</span>

                        </div>
                        <button
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ $t('dashboard.companies.createAction') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped lang="scss">

</style>
