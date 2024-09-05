<script setup>
import { Link } from '@inertiajs/vue3';
import Header from './LandingPage/Layouts/Header.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Header :login="canLogin"
            :register="canRegister"
    />
</template>
