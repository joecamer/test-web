<template>
  <div class="container-fluid bg-light vh-100">
    <div class="row h-100 flex-column justify-content-center align-items-center">
      <div class="p-0 rounded-lg col-xl-4 col-lg-5 col-sm-6 col-10">
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-primary text-white text-center">
            <h3 class="m-0">Identification</h3>
          </div>
          <div class="card-body py-5">
            <validation-observer v-slot="{ invalid }">
              <validation-provider name="Email" rules="required|email" v-slot="{ errors }">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input v-model="user.email" type="email" name="email" id="email" class="form-control" :class="errors[0] ? 'is-invalid' : 'is-valid'">
                  <div class="invalid-feedback" v-for="i in errors">{{ i }}</div>
                </div>
              </validation-provider>
              <div class="form-group">
                <validation-provider  name="Mot de passe" rules="required" v-slot="{ errors }">
                  <label for="pass">Mot de passe</label>
                  <input v-model="user.password" type="password" name="pass" id="pass" class="form-control" :class="errors[0] ? 'is-invalid' : 'is-valid'">
                  <small class="text-danger">{{ errors[0] }}</small>
                </validation-provider>
              </div>
              <div class="custom-checkbox custom-control">
                <input v-model="user.remember" type="checkbox" name="remember" id="remember" class="custom-control-input">
                <label for="remember" class="custom-control-label">Se souvenir de moi</label>
              </div>
              <div class="d-flex justify-content-end">
                <button :disabled="invalid" @click="submit()" class="btn btn-lg btn-primary">Connexion</button>
              </div>
            </validation-observer>
          </div>
        </div>
        <div class="card mt-4 border-0 shadow-sm">
          <div class="card-body text-center">
            <p class="m-0 text-muted">Pas de compte ?
              <inertia-link href="/register">Créez-en un</inertia-link>
              .
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios"
  import {ValidationProvider, ValidationObserver, extend} from 'vee-validate'
  import {required, email} from "vee-validate/dist/rules"

  extend('required', {
    ...required,
  });

  extend('email', {
    ...email,
    message: 'Email incorrect.'
  });

  export default {
    name: "Login",
    props: ['csrf'],
    components: {ValidationProvider, ValidationObserver},
    data: () => ({
      user: {
        email: '',
        password: '',
        remember: true,
      }
    }),
    methods: {
      submit() {
        axios.post('/login', {...this.user, _token: this.$page.props.csrf}).then(response => {
          console.log(response)
          window.location = '/'
        })
          .catch(err => console.log(err))
      }
    }
  }
</script>
