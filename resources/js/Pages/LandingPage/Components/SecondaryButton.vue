<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps(['href']);
</script>

<template>
    <Link :href="href" 
           class="group relative inline-block text-sm font-medium text-color-btn-sc focus:outline-none active:text-color-btn-sc">
        <span class="absolute inset-0 border border-current"></span>
        <span class="block border border-current bg-white px-4 md:px-8 py-3 transition-transform group-hover:-translate-x-1 group-hover:-translate-y-1">
            <slot/>
        </span>
    </Link>
</template>