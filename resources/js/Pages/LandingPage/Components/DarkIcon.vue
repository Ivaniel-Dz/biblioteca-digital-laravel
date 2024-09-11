<script setup>
import { ref } from 'vue';

const isDarkMode = ref(document.documentElement.classList.contains('dark'));

function toggleTheme() {
  isDarkMode.value = !isDarkMode.value;
  document.documentElement.classList.toggle('dark', isDarkMode.value);
}
</script>


<template>
  <!-- Botón switch dark/light-->
      <button
        @click="toggleTheme"
        class="h-8 w-8 flex justify-center items-center rounded-md dark:text-color-txt-dark text-color-txt hover:bg-gray-300 dark:hover:bg-gray-800 hover:text-gray-800 dark:hover:text-white wobble-hor-bottom"
      >
        <!-- btn dark -->
        <svg
          class="block dark:hidden flex-shrink-0 size-[17px]"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />

        </svg>
        <!-- btn light -->
        <svg
          class="hidden dark:block flex-shrink-0 size-[17px]"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <circle cx="12" cy="12" r="4" />
          <path d="M12 8a2 2 0 1 0 4 4" />
          <path d="M12 2v2" />
          <path d="M12 20v2" />
          <path d="m4.93 4.93 1.41 1.41" />
          <path d="m17.66 17.66 1.41 1.41" />
          <path d="M2 12h2" />
          <path d="M20 12h2" />
          <path d="m6.34 17.66-1.41 1.41" />
          <path d="m19.07 4.93-1.41 1.41" />
        </svg>

      </button>

  
</template>

<style>
/* Hover animation */
.wobble-hor-bottom:hover {
	-webkit-animation: wobble-hor-bottom 0.8s infinite both;
	        animation: wobble-hor-bottom 0.8s infinite both;
}

/* Animation */
@-webkit-keyframes wobble-hor-bottom {
  0%,
  100% {
    -webkit-transform: translateX(0%);
            transform: translateX(0%);
    -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
  }
  15% {
    -webkit-transform: translateX(-15px) rotate(-6deg);
            transform: translateX(-15px) rotate(-6deg);
  }
  30% {
    -webkit-transform: translateX(10px) rotate(6deg);
            transform: translateX(10px) rotate(6deg);
  }
  45% {
    -webkit-transform: translateX(-10px) rotate(-3.6deg);
            transform: translateX(-10px) rotate(-3.6deg);
  }
  60% {
    -webkit-transform: translateX(6px) rotate(2.4deg);
            transform: translateX(6px) rotate(2.4deg);
  }
  75% {
    -webkit-transform: translateX(-3px) rotate(-1.2deg);
            transform: translateX(-3px) rotate(-1.2deg);
  }
}
@keyframes wobble-hor-bottom {
  0%,
  100% {
    -webkit-transform: translateX(0%);
            transform: translateX(0%);
    -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
  }
  15% {
    -webkit-transform: translateX(-15px) rotate(-6deg);
            transform: translateX(-15px) rotate(-6deg);
  }
  30% {
    -webkit-transform: translateX(10px) rotate(6deg);
            transform: translateX(10px) rotate(6deg);
  }
  45% {
    -webkit-transform: translateX(-10px) rotate(-3.6deg);
            transform: translateX(-10px) rotate(-3.6deg);
  }
  60% {
    -webkit-transform: translateX(6px) rotate(2.4deg);
            transform: translateX(6px) rotate(2.4deg);
  }
  75% {
    -webkit-transform: translateX(-3px) rotate(-1.2deg);
            transform: translateX(-3px) rotate(-1.2deg);
  }
}


</style>