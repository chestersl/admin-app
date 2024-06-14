<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import VPaginate from "@/Components/VPaginate.vue";
import {route} from "ziggy-js";
import {Link} from "@inertiajs/vue3";


const props = defineProps({
    companies: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <AppLayout title="Employee">
        <template #header>
            <div class="header_cover">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $t('dashboard.companies.title') }}
                </h2>
                <Link :href="route('company.create')"
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ $t('dashboard.companies.createAction') }}
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    v-if="props.companies.total"
                    class="cover p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>{{ $t('dashboard.general.all') }}: {{ props.companies.total }}</h1>
                    <ul class="items_cover">
                        <li
                            class="item"
                            v-for="company in props.companies.data">
                            <div class="item_image">
                                <img :src="company.logo === null ? '/build/images/logo_pluck.webp' : company.logo"
                                     :alt="`Logo ${company.name}`">
                            </div>
                            <div class="item_content">
                                <p>{{ $t('dashboard.companies.employees') }}:
                                    {{ company.employees_count ? company.employees_count : '-' }}</p>
                                <h1>{{ company.name }}</h1>
                                <a v-if="!!company.email" :href="`mailto:${company.email}`">{{ company.email }}</a>
                                <a v-if="!!company.website" :href="company.website"> Company Website </a>
                            </div>
                            <div class="item_options">
                                <Link
                                    :as="'button'"
                                    method="delete"
                                    :href="route('company.destroy', company.id)">
                                    {{ $t('dashboard.buttons.delete') }}
                                </Link>
<!--                                <a href="#">-->
<!--                                    {{ $t('dashboard.buttons.edit') }}-->
<!--                                </a>-->
                            </div>
                        </li>
                    </ul>
                    <VPaginate :links="props.companies.links"/>
                </div>
                <div
                    v-else
                    class="cover p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>{{ $t('dashboard.companies.empty') }}</h1>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped lang="scss">

.header_cover {
    display: flex;
    align-items: center;
    gap: 20px;
    justify-content: space-between;
}

.cover {
    display: flex;
    flex-direction: column;
    gap: 40px;

    .items_cover {
        display: flex;
        flex-direction: column;
        gap: 20px;

        .item {
            padding: 24px;
            border-radius: 5px;
            border: 1px solid gray;
            display: flex;
            justify-content: space-between;
            gap: 20px;

            &_image {
                width: 96px;
                height: 96px;
                overflow: hidden;
                border-radius: 50%;

                & > img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }

            &_content {
                display: flex;
                flex-direction: column;
                flex: 1;

                & > a {
                    text-decoration: underline;
                    color: #6366f1;
                }
            }

            &_options {
                display: flex;
                flex-direction: column;
                align-items: end;
                gap: 20px;
            }
        }
    }
}
</style>
