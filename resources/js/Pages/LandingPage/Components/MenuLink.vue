<script setup>
    defineProps({
        menuOpen: Boolean,
    });
</script>

<template>
    <nav aria-label="Global" class="flex flex-col md:flex-row items-center gap-6 text-sm md:text-base">
        <ul :class="{ 'flex': menuOpen, 'hidden': !menuOpen, 'md:flex': true, 'flex-col': true, 'md:flex-row': true }"
            class="w-full md:w-auto md:flex md:items-center md:gap-6 text-sm md:text-base">
            <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                    About
                </a>
            </li>

            <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                    Careers
                </a>
            </li>

            <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                    History
                </a>
            </li>

            <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                    Services
                </a>
            </li>

            <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                    Projects
                </a>
            </li>

            <li>
                <a class="text-gray-500 transition hover:text-gray-500/75" href="#">
                    Blog
                </a>
            </li>
        </ul>
    </nav>
</template>