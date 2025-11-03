<template>
  <div class="d-flex">
    <Sidebar />
    <main class="flex-grow-1 p-3">
      <slot></slot>
      <h2 class="text-center mt-2">{{ $t("states") }}</h2>

      <!-- Contenedor con scroll vertical -->
      <div class="table-container">
        <table class="table table-hover table-borderless">
          <thead class="table-light">
            <tr>
              <th>{{ $t("satCode") }}</th>
              <th>{{ $t("nameState") }}</th>
              <th>{{ $t("abbreviation") }}</th>
              <th>{{ $t("actions") }}</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr
              v-for="state in states"
              :key="state.id"
              @click="openModal(state)"
              style="cursor: pointer"
            >
              <td>{{ state.state_code }}</td>
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
                    {{ $t("more") }}
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

      <!-- modal -->
      <div
        class="modal fade"
        id="stateModal"
        tabindex="-1"
        aria-labelledby="stateModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="stateModalLabel">{{ $t("state_details") }}</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body" v-if="selectedState">
              <p>
                <strong>{{ $t("geostatistical_key") }}:</strong>
                {{ selectedState.geostatistical_key }}
              </p>
              <p>
                <strong>{{ $t("satCode") }}:</strong> {{ selectedState.state_code }}
              </p>
              <p>
                <strong>{{ $t("name_state") }}:</strong> {{ selectedState.state_name }}
              </p>
              <p>
                <strong>{{ $t("abbreviation") }}:</strong>
                {{ selectedState.state_abbreviation }}
              </p>
              <p><strong>total:</strong> {{ selectedState.total_population }}</p>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Sidebar from "../Layout/Sidebar.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { Modal } from "bootstrap"; // Importar Modal de bootstrap

export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      states: [],
      selectedState: null,
    };
  },
  mounted() {
    this.states = usePage().props.value.states;
  },
  methods: {
    openModal(state) {
      this.selectedState = state;
      const modalElement = document.getElementById("stateModal");
      const modal = new Modal(modalElement);
      modal.show();
    },
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
