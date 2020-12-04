<template>
  <div>
    <div class="container-fluid bg-light vh-100 position-relative">
      <div class="row h-100 flex-wrap-reverse flex-md-wrap main-frame">
        <div class="col-lg-2 col-md-3 d-md-flex d-none p-0 bg-primary text-white flex-column justify-content-between h-100">
          <ul class="menu-header">
            <li>
              <left-menu-item icon="menu-item-1.svg" to="room-reservation" label="reservation de salle"/>
            </li>
            <li>
              <left-menu-item icon="menu-item-2.svg" to="room-reservation" label="reservation de place"/>
            </li>
          </ul>
          <div class="menu-footer px-3 py-2 text-center">
            <p class="p-0">Copyright &copy; Enterprise.</p>
            <img src="storage/logo.svg" alt="Logo" style="width: 150px">
          </div>
        </div>
        <div class="col h-100 bg-white p-0">
          <navbar-item />

          <slot />
        </div>
      </div>
      <ul class="menu-bottom bg-primary text-white">
        <li>
          <left-menu-item icon="menu-item-1.svg" to="room-reservation" label="reservation de salle"/>
        </li>
        <li>
          <left-menu-item icon="menu-item-2.svg" to="room-reservation" label="reservation de place"/>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  import LeftMenuItem from "../components/left-menu-item";
  import NavbarItem from "../components/navbar-item";
  export default {
    components: {NavbarItem, LeftMenuItem},
  }
</script>
