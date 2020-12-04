<template>
  <div class="container-fluid bg-light vh-100 d-flex flex-column justify-content-center">
    <div class="row justify-content-center">
      <div
        class="col-md-3 p-0 bg-primary d-flex flex-column justify-content-center align-items-center text-white shadow">
        <h2><strong>Entreprise</strong></h2>
        <img src="/storage/logo.svg" alt="Logo" class="w-50">
      </div>
      <div class="col-md-5 p-0 shadow">
        <div class="card border-0">
          <div class="card-header bg-primary text-white">
            <h3>Enregistrez-vous</h3>
          </div>
          <div class="card-body">
            <form class="w-100" @submit.prevent="submit">
              <div class="form-group">
                <label for="name">Nom et prenom</label>
                <input v-model="user.name" type="text" name="name" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Adresse Email</label>
                <input v-model="user.email" type="email" name="email" id="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input v-model="user.password" type="password" name="password" id="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="pass_confirm">Retapez le mot de passe</label>
                <input v-model="user.password_confirmation" type="password" name="pass_confirm" id="pass_confirm"
                       class="form-control">
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <inertia-link href="/login">Je possède déjà un compte.</inertia-link>
                </div>
                <button type="submit" class="btn btn-lg btn-outline-primary">Valider</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios"

  export default {
    name: "Register",
    props: ['csrf'],
    data: () => ({
      user: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    }),
    methods: {
      submit() {
        axios.post('/register', {...this.user, _token: this.$page.props.csrf}).then(e => {
          console.log(e)
          window.location = '/'
        }).catch(err => console.error(err))
      }
    }
  }
</script>

<style scoped>

</style>
