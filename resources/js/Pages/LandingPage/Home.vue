<script setup>
import { Head } from "@inertiajs/vue3";
import Spotlight from "./Components/Spotlight.vue";
</script>

<template>

    <Head title="Inicio -" />

    <div class="h-screen">
        <!-- Text Intro -->
        <article class="text-color-txt-dark/85 absolute top-32 w-[600px] left-[450px] text-center text-focus-in">
            <h1 class="text-title-banner font-bold">
                Bienvenido a <br />
                Biblioteca Digital Lothlorien
            </h1>
            <p class="text-xl pt-4">
                La lectura imperativa es un hechizo que desvela misterios y guía
                tu mente a través de mundos de conocimiento. Sumérgete en textos
                que transforman el saber en poder y despiertan la magia del
                aprendizaje.
            </p>
        </article>

        <!-- Banner/Spotlight -->
        <picture>
            <Spotlight />
            <img src="images/circle.webp" alt="banner" class="w-full h-full object-cover" />
        </picture>
    </div>
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
