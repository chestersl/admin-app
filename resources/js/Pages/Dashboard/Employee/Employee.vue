<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import VPaginate from "@/Components/VPaginate.vue";
import {Link} from "@inertiajs/vue3";
import {route} from "ziggy-js";

const props = defineProps({
    employees: {
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
                    {{ $t('dashboard.employees.title') }}
                </h2>
                <Link :href="route('employee.create')"
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ $t('dashboard.employees.createAction') }}
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    v-if="props.employees.total"
                    class="cover p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>{{ $t('dashboard.general.all') }}: {{ props.employees.total }}</h1>
                    <ul class="items_cover">
                        <li
                            class="item"
                            v-for="employee in props.employees.data">
                            <div class="item_content">
                                <h1>{{ `${employee.first_name} ${employee.last_name}` }}</h1>
                                <a v-if="!!employee.email" :href="`mailto:${employee.email}`">{{ employee.email }}</a>
                                <p>{{ employee.phone }}</p>
                                <span>{{
                                        !!employee.company ?
                                            `${$t('dashboard.employees.company')}: ${employee.company.name}` :
                                            $t('dashboard.employees.unemployed')
                                    }}</span>
                            </div>
                            <div class="item_options">
                                <Link
                                    :as="'button'"
                                    method="delete"
                                    :href="route('employee.destroy', employee.id)">
                                    {{ $t('dashboard.buttons.delete') }}
                                </Link>
                                <Link :href="route('employee.edit', employee.id)">
                                    {{ $t('dashboard.buttons.edit') }}
                                </Link>
                            </div>
                        </li>
                    </ul>
                    <VPaginate :links="props.employees.links"/>
                </div>
                <div
                    v-else
                    class="cover p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1>{{ $t('dashboard.employees.empty') }}</h1>
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

            &_content {
                display: flex;
                flex-direction: column;
                gap: 8px;
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
