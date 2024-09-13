<script setup>
import { Head } from '@inertiajs/vue3';
import Header from './LandingPage/Layouts/Header.vue';
import ParticleCanvas from './LandingPage/Components/ParticleCanvas.vue';
import Home from './LandingPage/Home.vue';
import Books from './LandingPage/Books.vue';
import Service from './LandingPage/Service.vue';
import About from './LandingPage/About.vue';
import Footer from './LandingPage/Layouts/Footer.vue';

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
        <Service/>
        <About/>
        <Footer/>
    </div>
</template>
