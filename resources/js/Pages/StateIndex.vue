<template>
  <div class="d-flex">
    <Sidebar />
    <main class="flex-grow-1 p-3">
      <slot></slot>
      <h2 class="text-center mt-2">States</h2>

      <!-- Contenedor con scroll vertical -->
      <div class="table-container">
        <table class="table table-hover table-borderless">
          <thead class="table-light">
            <tr>
              <th>SatCode</th>
              <th>Name State</th>
              <th>Abrevation</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr v-for="state in states" :key="state.id">
              <td>
                <a href="#">{{ state.state_code }}</a>
              </td>
              <td>{{ state.state_name }}</td>
              <td>{{ state.state_abbreviation }}</td>
              <td>
                <div class="dropdown">
                  <button
                    class="btn btn-default dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    More
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#">{{ state.state_name }}</a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</template>

<script>
import Sidebar from "../Layout/Sidebar.vue";
import { usePage } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      states: [],
    };
  },
  mounted() {
    this.states = usePage().props.value.states;
  },
};
</script>

<style scoped>
.d-flex {
  min-height: 100vh;
}

main {
  background-color: #f8f9fa;
  padding: 1rem;
}

/* Contenedor scrollable */
.table-container {
  max-height: 900px; /* Ajusta según necesites */
  overflow-y: auto;
  overflow-x: auto; /* Mantiene el scroll horizontal si la tabla es muy ancha */
}
</style>
