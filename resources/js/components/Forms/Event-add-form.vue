<template>
  <b-modal hide-footer size="md" id="addModal" title="Ajouter une nouvel évènement" ok-only @ok="submit">
    <div class="row position-relative">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-danger" v-if="message !== ''" v-html="message"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="name">Nom de l'evenement</label>
              <input class="form-control" type="text" id="name" v-model="evt.name">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="evt_date">Date de l'evenement</label>
              <input class="form-control" type="date" id="evt_date" v-model="evt.evt_date">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="evt_start">Heure de début</label>
              <input class="form-control" type="text" id="evt_start" v-model="evt.evt_start">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="evt_end">Heure de fin</label>
              <input class="form-control" type="text" id="evt_end" v-model="evt.evt_end">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="room">Salle</label>
              <b-form-select id="room" v-model="evt.room">
                <b-form-select-option :value="room.id" v-for="(room, i) in $page.props.rooms" :key="i">{{ room.room_name
                  }}
                </b-form-select-option>
              </b-form-select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" @click="submit">Enregistrer</button>
          </div>
        </div>
      </div>
      <loader-spinner v-if="loading" />
    </div>
  </b-modal>
</template>

<script>
  import axios from "axios"
  import LoaderSpinner from "../loader-spinner";

  export default {
    name: "Event-add-form",
    components: {LoaderSpinner},
    data: () => ({
      evt: {
        name: '',
        evt_date: '',
        evt_start: '',
        evt_end: '',
        room: '',
      },
      message: '',
      loading: false
    }),
    methods: {
      submit() {
        this.loading = true
        axios.post('/events/add', {
          ...this.evt,
          _token: this.$page.props.csrf
        }).then(({data}) => {
          console.log(data)
          if (data === 1) {
            this.$parent.$bvToast.toast(`L'évènement a bien été enregistré`, {
              title: 'Succès',
              autoHideDelay: 5000,
              variant: 'success',
              appendToast: true,
              solid: true
            })
            this.$emit('refresh')
            this.$bvModal.hide('addModal')
          } else {
            this.message = `Veuillez choisir d'autres paramètres car l'evenement <strong>${data[0].event_name}</strong> aura lieu dans cette salle
             à la même date et à cette intervalle d'heures.`
          }
        }).catch(err => console.log(err)).finally(() => { this.loading = false })
      }
    }
  }
</script>

<style scoped>

</style>
