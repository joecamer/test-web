<template>
  <b-navbar variant="primary" sticky class="shadow-sm" style="z-index: 2">
    <b-navbar-nav class="ml-auto align-items-center">
      <b-nav-item>
        <div class="bg-light rounded-pill p-2 pr-3 d-flex align-items-center">
          <img :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" id="user_avatar">
          {{ $page.props.user.name }}
        </div>
      </b-nav-item>
      <b-nav-item>
        <inertia-link style="border: 0;background-color: transparent;" as="button" href="/logout" method="post">
          <div class="rounded-pill bg-danger p-2 text-white">
            <b-icon-power></b-icon-power>
            Deconnexion
          </div>
        </inertia-link>
      </b-nav-item>
    </b-navbar-nav>
  </b-navbar>
</template>

<script>
  export default {
    name: "navbar-item",
  }
</script>
