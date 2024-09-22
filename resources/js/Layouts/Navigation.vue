<template>
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
    <div class="py-4 text-gray-500">
      <Link class="ml-6  flex text-lg font-bold text-gray-800" :href="route('dashboard')">
      <span class="inline-flex items-center">
        <PhLightBooks class="w-6 h-6" />
        <span class="ml-4"> Biblioteca Lothlorien </span>
      </span>
      </Link>

      <ul class="mt-6">
        <li class="relative px-6 py-3">
          <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon>
              <LaHomeSolid class="w-5 h-5" />
            </template>
            Dashboard
          </NavLink>
        </li>

        <li class="relative px-6 py-3">
          <NavLink :href="route('users.index')" :active="route().current('users.index')">
            <template #icon>
              <LiUsers class="w-5 h-5" />
            </template>
            Users
          </NavLink>
        </li>

        <li class="relative px-6 py-3">
          <NavLink :href="route('users.index')" :active="route().current('users.index')">
            <template #icon>
              <LaBookSolid class="w-5 h-5" />
            </template>
            Libros
          </NavLink>
        </li>

                <li class="relative px-6 py-3">
          <NavLink :href="route('prestamos.historial')" :active="route().current('prestamos.historial')">
            <template #icon>
              <LaBookSolid class="w-5 h-5" />
            </template>
            Prestamos
          </NavLink>
        </li>

        <li class="relative px-6 py-3">
          <button @click="showingTwoLevelMenu = !showingTwoLevelMenu"
            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
            aria-haspopup="true">
            <span class="inline-flex items-center">
              <LuMenu class="w-5 h-5" />
              <span class="ml-4">Registros</span>
            </span>
            <IcNavArrowDown class="w-4 h-4" />
          </button>
          <ul v-show="showingTwoLevelMenu"
            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50"
            aria-label="submenu">
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
              <NavLink :href="route('prestamos.index')" :active="route().current('prestamos.index')">
                <template #icon>
                  <PhThinFolderOpen class="w-5 h-5" />
                </template>
                Préstamos
              </NavLink>
            </li>
            <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
              <NavLink :href="route('reservas.index')" :active="route().current('reservas.index')">
                <template #icon>
                  <PhThinFolderOpen class="w-5 h-5" />
                </template>
                Reservas
              </NavLink>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script>
import { PhLightBooks, LaBookSolid, LaHomeSolid, LuMenu, LiUsers, PhThinFolderOpen, IcNavArrowDown } from '@kalimahapps/vue-icons';
import NavLink from "@/Components/NavLink.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
  components: {
    NavLink,
    Link,
    PhLightBooks,
    LaBookSolid,
    LaHomeSolid,
    LuMenu,
    LiUsers,
    PhThinFolderOpen,
    IcNavArrowDown,
  },

  setup() {
    let showingTwoLevelMenu = ref(false);

    return {
      showingTwoLevelMenu,
    };
  },
};
</script>
