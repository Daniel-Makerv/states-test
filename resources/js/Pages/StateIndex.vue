<!-- Layout.vue -->
<template>
  <div>
    <Sidebar /> <!-- Este es tu navbar horizontal -->
    <main class="p-3">
      <slot></slot>
      <h1>Contenido de la página</h1>
    </main>
  </div>
</template>

<script>
import Sidebar from "../Layout/Sidebar.vue";

export default {
  components: { Sidebar },
};
</script>

<style scoped>
main {
  min-height: calc(100vh - 56px); /* Ajusta según la altura de tu navbar */
  background-color: #f8f9fa;
}
</style>
