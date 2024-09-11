<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import DarkIcon from '../Components/DarkIcon.vue';
import MenuLink from '../Components/MenuLink.vue';

    // Instancia los objetos
    defineProps({
        login: {
        type: Boolean,
        },
        register: {
        type: Boolean,
        },
    });

    // Open/close Menu Mobile
    const isMenuOpen = ref(false);

    function toggleMenu() {
    isMenuOpen.value = !isMenuOpen.value;
    }

</script>

<template>
    <header class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <a class="block text-teal-600" href="#">
            <span class="sr-only">Home</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-books" width="44" height="44"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                <path d="M5 8h4" />
                <path d="M9 16h4" />
                <path
                    d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                <path d="M14 9l4 -1" />
                <path d="M16 16l3.923 -.98" />
            </svg>
        </a>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <!-- Links Navegations -->
             <MenuLink :menuOpen="isMenuOpen"/>

            <!-- Icon Dark/Light -->
            <DarkIcon class="text-left" />

            <!-- Login Dashboard -->
            <div class="flex items-center gap-4">
                <!-- Login & Register -->
                <div v-if="login" class="sm:flex sm:gap-4">
                    <!-- Boton de Login con sección iniciada -->
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="block rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
                        Login
                    </Link>

                    <!-- Boton de Login & Register sin iniciar -->
                    <div v-else class="sm:flex sm:gap-4">
                        <Link :href="route('login')"
                            class="block rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700">
                            Login
                        </Link>

                        <Link v-if="register" :href="route('register')"
                            class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block">
                            Register
                        </Link>
                    </div>
                </div>

                <!-- Icon Hamburger -->
                <button @click="toggleMenu"
                    class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden">
                    <span class="sr-only">Toggle menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
            </div>
        </div>
    </header>
</template>