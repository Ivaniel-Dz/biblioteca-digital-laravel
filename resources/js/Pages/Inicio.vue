<script setup>
import { Head } from '@inertiajs/vue3';
import Header from './LandingPage/Layouts/Header.vue';
import Home from './LandingPage/Home.vue';
import Books from './LandingPage/Books.vue';
import ParticleCanvas from './LandingPage/Components/ParticleCanvas.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    books: Array,
});
</script>

<template>
    <Head title="Inicio -"/>

    <div class="bg-color-main dark:bg-color-dark">
        <ParticleCanvas />
        <Header :login="canLogin" :register="canRegister" />
        <Home />
        <Books :libros="books" />
    </div>
</template>

