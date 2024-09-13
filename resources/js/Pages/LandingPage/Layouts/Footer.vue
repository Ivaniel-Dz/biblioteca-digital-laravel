<script setup>
import { LaFacebookF, LaInstagram, LaTwitter ,LaLinkedinIn } from '@kalimahapps/vue-icons';

</script>

<template>
    <footer class="flex flex-col items-center justify-between py-12 md:flex-row md:px-pdg-tablet">
        <p class="mb-8 text-sm text-center text-color-txt dark:text-color-txt-dark md:text-left md:mb-0">© Copyright 2024 Biblioteca Lothlorien. All Rights
            Reserved.</p>
        <div class="flex items-center space-x-6">
            <a href="#">
               <LaFacebookF class="dark:fill-color-txt-dark fill-color-btn" />
            </a>
            <a href="#">
                <LaInstagram class="dark:fill-color-txt-dark fill-color-btn" />
            </a>
            <a href="#">
                <LaTwitter class="dark:fill-color-txt-dark fill-color-btn" />
            </a>
            <a href="#">
                <LaLinkedinIn class="dark:fill-color-txt-dark fill-color-btn" />
            </a>
        </div>
    </footer>
</template>