<template>
    <div class="relative md:inline-flex" v-cloak>
        <div class="relative">
            <button class="flex items-center text-color-txt dark:text-color-txt-dark transition hover:text-color-txt/75" @click="toggleSubMenu">
                Categorías
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                    class="flex-none w-4 h-4 ml-1 -mr-1 transition duration-200 ease-out transform"
                    :class="{ 'rotate-180': isOpen }">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
            <div class="absolute top-0 z-50 w-screen max-w-md p-2 mx-0 my-12 text-sm text-color-txt transform bg-color-main dark:bg-color-dark rounded shadow lg:left-1/2 lg:-translate-x-1/2"
                v-show="isOpen" @click="closeSubMenu">
                <ul class="space-y-1">
                    <li>
                        <Link :href="route('book.view', {name: 'love' })"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-color-txt-dark"
                            @click.prevent="scrollTo('#teams')">
                            Romantica
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('book.view', {name: 'science_fiction' })"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-color-txt-dark"
                            @click.prevent="scrollTo('#billing')">
                            Ciencia Fición
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('book.view', {name: 'love' })"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-color-txt-dark"
                            @click.prevent="scrollTo('#invoices')">
                            Invoices
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('book.view', {name: 'love' })"
                            class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-300 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-color-txt-dark"
                            @click.prevent="scrollTo('#account')">
                            Account
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const isOpen = ref(false);

const toggleSubMenu = () => {
    isOpen.value = !isOpen.value;
};

const closeSubMenu = () => {
    isOpen.value = false;
};

const scrollTo = (selector) => {
    document.querySelector(selector)?.scrollIntoView({ behavior: 'smooth' });
};
</script>

<style scoped>
/* Opcional: ocultar el componente hasta que Vue lo procese */
[v-cloak] {
    display: none;
}
</style>
