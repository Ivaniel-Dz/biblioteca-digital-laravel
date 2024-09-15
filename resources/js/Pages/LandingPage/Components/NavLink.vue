<script setup>
import SubLink from './SubLink.vue';

    defineProps({
        menuOpen: Boolean,
    });

</script>

<template>
    <nav aria-label="Global" class="flex flex-col md:flex-row items-center gap-6 text-sm md:text-base">
        <ul :class="{ 'absolute': menuOpen, 'hidden': !menuOpen, 'md:flex': true, 'flex-col': true, 'md:flex-row': true }"
            class="z-10 bg-color-main dark:bg-color-dark w-full left-0 py-4 pl-7 top-16 text-base font-medium md:flex md:w-auto md:items-center md:gap-6">
            <li class="my-6 md:my-0">
                <a class="text-color-txt dark:text-color-txt-dark transition hover:text-color-txt/75" href="/">
                    Inicio
                </a>
            </li>

            <li class="my-6 md:my-0">
                <a class="text-color-txt dark:text-color-txt-dark transition hover:text-color-txt/75" href="/#books">
                    Libros
                </a>
            </li class="my-6 md:my-0">

            <li class="my-6 md:my-0">
                <!-- Categorías -->
                <SubLink/>
            </li>

            <li class="my-6 md:my-0">
                <a class="text-color-txt dark:text-color-txt-dark transition hover:text-color-txt/75" href="/#services">
                    Servicios
                </a>
            </li>

            <li class="my-6 md:my-0">
                <a class="text-color-txt dark:text-color-txt-dark transition hover:text-color-txt/75" href="/#about">
                    Nosotros
                </a>
            </li>
        </ul>
    </nav>
</template>