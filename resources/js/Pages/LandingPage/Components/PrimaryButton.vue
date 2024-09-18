<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const props = defineProps(['href']);
</script>

<template>
    <Link :href="href" 
           class="group relative inline-block text-sm font-medium text-white focus:outline-none">
        <span class="absolute inset-0 border border-color-btn-sc group-active:border-color-btn-sc"></span>
        <span class="block border border-color-btn-sc bg-color-btn-sc px-4 md:px-8 py-3 transition-transform active:border-color-btn-sc active:bg-color-btn-sc group-hover:-translate-x-1 group-hover:-translate-y-1">
            <slot/>
        </span>
    </Link>

</template>