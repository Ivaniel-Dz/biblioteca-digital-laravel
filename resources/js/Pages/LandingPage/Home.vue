<script setup>
import { Head } from "@inertiajs/vue3";
import Spotlight from "./Components/Spotlight.vue";
</script>

<template>

    <Head title="Inicio -" />

    <!-- Hero Banner -->
    <section class="relative bg-cover bg-center h-screen text-white"
        style="background-image: url('images/banner.webp');">
        <Spotlight />
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-1 flex flex-col items-center justify-center h-full text-center">
            <h1 class="text-5xl font-bold text-focus-in">Bienvenido a la Biblioteca Lothlorien</h1>
            <p class="mt-4 text-xl leading-relaxed max-w-lg text-focus-in">
                Sumérgete en el maravilloso mundo de la lectura imperativa y descubre miles de libros que esperan por
                ti.
            </p>
            <a href="#books"
                class="mt-8 bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition">Explorar
                Libros</a>
        </div>
    </section>

</template>

<style scoped>
.text-focus-in {
    -webkit-animation: text-focus-in 2s cubic-bezier(0.55, 0.085, 0.68, 0.53) both;
    animation: text-focus-in 2s cubic-bezier(0.55, 0.085, 0.68, 0.53) both;
}

@-webkit-keyframes text-focus-in {
    0% {
        -webkit-filter: blur(12px);
        filter: blur(12px);
        opacity: 0;
    }

    100% {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        opacity: 1;
    }
}

@keyframes text-focus-in {
    0% {
        -webkit-filter: blur(12px);
        filter: blur(12px);
        opacity: 0;
    }

    100% {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        opacity: 1;
    }
}
</style>
