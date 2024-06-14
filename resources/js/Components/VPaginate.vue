<script setup>

const props = defineProps({
    links: [Object, Array]
})

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <ul v-if="(props.links).length > 3" class="pagination">
        <li v-for="item in props.links">
            <Link
                :href="!!item.url ? item.url : '#'"
                :class="{disabled: item.active || item.url === null}"
                v-html="item.label">
            </Link>
        </li>
    </ul>
</template>

<style scoped lang="scss">
.pagination {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;

    & > li {
        & > a {
            &:is(.disabled) {
                pointer-events: none;
                color: #bbb;
            }
        }
    }
}
</style>
