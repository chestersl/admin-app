<script setup>

import {route} from "ziggy-js";
import AppLayout from "@/Layouts/AppLayout.vue";
import {useForm, router} from "@inertiajs/vue3";

const props = defineProps({
    employee: {
        type: Object,
        required: true
    },
    companies: {
        type: Array,
        required: true
    },
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
    company_id: props.employee.company_id,
    first_name: props.employee.first_name,
    last_name: props.employee.last_name,
    email: props.employee.email,
    phone: props.employee.phone,
    csrf: props.csrf
})

function formSubmit() {
    form.put(route('employee.update', props.employee.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('first_name', 'last_name', 'email', 'phone', 'company_id')

            router.get(route('employee.index'))
        }
    })
}


</script>

<template>
    <AppLayout title="Company create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('dashboard.employees.editAction') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="cover p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form @submit.prevent="formSubmit">
                        <div class="mb-6">
                            <label for="companies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $t('dashboard.employees.form.company') }}
                            </label>
                            <select
                                id="companies"
                                v-model="form.company_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value=""></option>
                                <option
                                    v-for="company in props.companies"
                                    :key="company.id"
                                    :value="company.id">
                                    {{ company.name }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="first_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $t('dashboard.employees.form.firstName') }}
                            </label>
                            <input
                                v-model="form.first_name"
                                type="text"
                                id="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Alex"
                                required/>
                            <span v-if="errors.first_name">
                                {{ errors.first_name }}
                            </span>
                        </div>
                        <div class="mb-6">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ $t('dashboard.employees.form.lastName') }}
                            </label>
                            <input
                                v-model="form.last_name"
                                type="text"
                                id="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Bro"
                                required/>
                            <span v-if="errors.last_name">
                                {{ errors.last_name }}
                            </span>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $t('dashboard.employees.form.email') }}
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
                                <label for="phone"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $t('dashboard.employees.form.phone') }}
                                </label>
                                <input
                                    v-model="form.phone"
                                    type="text"
                                    id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="+380688288282"/>
                                <span v-if="errors.phone">
                                    {{ errors.phone }}
                                </span>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ $t('dashboard.employees.editAction') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped lang="scss">

</style>
