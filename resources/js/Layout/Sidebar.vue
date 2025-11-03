<!-- Sidebar.vue -->
<template>
  <aside class="sidebar d-flex flex-column p-3 text-white">
    <!-- Logo -->
    <a
      href="#"
      class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
    >
      <img src="https://fastbootstrap.com/images/bootstrap-logo.svg" width="36" />
      <span class="fs-4 ms-2">Brand</span>
    </a>

    <hr class="text-secondary" />

    <!-- Menu principal -->
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/" class="nav-link text-white d-flex align-items-center">
          <i class="bi bi-house-door me-2"></i>
          Home
        </a>
      </li>
      <li>
        <a href="/" class="nav-link text-white d-flex align-items-center">
          <i class="bi bi-people me-2"></i>
          States
        </a>
      </li>
      <li>
        <a
          @click="toggleMenu('projects')"
          class="nav-link text-white d-flex align-items-center justify-content-between"
          style="cursor: pointer"
        >
          <span><i class="bi bi-folder me-2"></i>Projects</span>
          <i :class="openMenus.projects ? 'bi bi-chevron-up' : 'bi bi-chevron-down'"></i>
        </a>
        <ul v-show="openMenus.projects" class="nav flex-column ms-3 collapse-menu">
          <li>
            <a href="/" class="nav-link text-white"
              ><i class="bi bi-circle me-2"></i>Action</a
            >
          </li>
          <li>
            <a href="/" class="nav-link text-white"
              ><i class="bi bi-circle me-2"></i>Another action</a
            >
          </li>
        </ul>
      </li>
    </ul>

    <hr class="text-secondary" />

    <!-- Search -->
    <form class="d-flex mb-3">
      <input type="text" class="form-control form-control-sm" placeholder="Search" />
    </form>

    <!-- Signup -->
    <button class="btn btn-gradient w-100">Sign up</button>
  </aside>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      openMenus: {
        projects: false,
      },
    };
  },
  methods: {
    toggleMenu(menu) {
      this.openMenus[menu] = !this.openMenus[menu];
    },
  },
};
</script>

<style scoped>
/* Sidebar fondo degradado */
.sidebar {
  width: 250px;
  min-height: 100vh;
  background: linear-gradient(180deg, #343a40, #212529);
}

/* Nav link hover */
.nav-link {
  border-radius: 6px;
  transition: background 0.2s;
}
.nav-link:hover {
  background-color: #495057;
}

/* Submenu con transición */
.collapse-menu {
  transition: all 0.3s ease;
}

/* Botón gradient */
.btn-gradient {
  background: linear-gradient(135deg, #4f46e5, #3b82f6);
  border: none;
}
.btn-gradient:hover {
  background: linear-gradient(135deg, #3b82f6, #4f46e5);
}

/* Iconos Bootstrap Icons */
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
</style>
