<template>
  <layout>
    <div class="container-fluid overflow-auto" style="max-height: 100%;">
      <div class="row pb-5">
        <div class="col-lg-12 py-4 pb-5">
          <b-calendar v-model="selectedDate" show-decade-nav class="w-100" block
                      label-no-date-selected="Veuillez selectionner une date"></b-calendar>
          <div class="mt-3 position-relative" style="min-height: 100px;">
            <h6 class="text-primary">Evenements pour le {{ selectedDate }}</h6>
            <hr>
            <div v-if="eventsToDate.length >= 1">
              <ul class="list-group">
                <li @click="openInfo(event)" v-for="(event, index) in eventsToDate" :key="index"
                    class="list-group-item list-group-item-action">
                  <div class="d-flex justify-content-between">
                    <span>{{ event.event_name }}</span>
                    <div class="d-flex">
                      <button @click="remove(event)" class="btn btn-outline-danger">
                        <b-icon-trash/>
                      </button>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <p v-else class="text-muted text-center">
              Aucun evenement pour le {{ selectedDate }}
            </p>
            <h6 class="text-primary mt-3">Evenements à venir</h6>
            <hr>
            <div v-if="events.length >= 1" class="py-2">
              <ul class="list-group">
                <li @click="openInfo(event)" v-for="(event, index) in events" :key="index"
                    class="list-group-item list-group-item-action">
                  <div class="d-flex justify-content-between">
                    <span>{{ event.event_name }}</span>
                    <div class="d-flex">
                      <button @click="remove(event)" class="btn btn-outline-danger">
                        <b-icon-trash/>
                      </button>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <p v-else class="text-muted text-center">
              Aucun evenement à venir.
            </p>
            <loader-spinner v-if="loading.events"/>
          </div>
          <button v-b-modal.addModal class="btn btn-primary rounded-circle fab shadow" style="width: 60px;height: 60px;">
            <b-icon-plus font-scale="2"/>
          </button>
        </div>
      </div>
    </div>
    <event-add-form v-on:refresh="refresh"/>
    <view-event :event="selectedEvent"/>
  </layout>
</template>

<script>
  import Layout from "../Shared/Layout.vue"
  import EventAddForm from "../components/Forms/Event-add-form"
  import axios from "axios"
  import LoaderSpinner from "../components/loader-spinner";
  import ViewEvent from "../components/view-event";

  export default {
    components: {ViewEvent, LoaderSpinner, EventAddForm, Layout},
    data: () => ({
      events: [],
      eventsToDate: [],
      selectedEvent: {},
      loading: {
        events: false
      },
      selectedDate: ''
    }),
    methods: {
      async fetch() {
        const response = await axios.get('/events')
        this.events = response.data
      },
      remove(event) {
        if (confirm("Etes-vous sûr de vouloir supprimer ?")) {
          this.loading.events = true
          axios.delete(`/events/${event.id}/delete`).then(({data}) => {
            if (data === 1) {
              this.$bvToast.toast('Supprimé de la liste', {
                variant: 'success',
                title: 'Supprimé',
                autoHideDelay: 5000,
                solid: true
              })
              this.fetch()
            } else {
              this.$bvToast.toast('Une erreur est survenue', {
                variant: 'danger',
                title: 'Errur',
                autoHideDelay: 5000,
                solid: true
              })
              console.log(data)
            }
          }).catch(err => console.log(err)).finally(() => this.loading.events = false)
        }
      },
      refresh() {
        this.loading.events = true
        this.fetch().finally(() => this.loading.events = false)
      },
      openInfo(event) {
        console.log(event)
        this.selectedEvent = event
        this.$bvModal.show('view-event')
      }
    },
    mounted() {
      this.loading.events = true
      this.fetch().finally(() => this.loading.events = false)
      const cd = new Date() // Current date
      this.selectedDate = `${cd.getFullYear()}-${cd.getMonth()}-${cd.getDate()}`
    },
    watch: {
      selectedDate: async function (newValue) {
        this.loading.events = true
        const response = await axios.get(`/events/search/${newValue}`)
        this.eventsToDate = response.data
        this.loading.events = false
        this.selectedEvent = this.events[0]
      }
    }
  }
</script>

<style>
  #user_avatar {
    width: 30px;
    border-radius: 50%;
    margin-right: 3px;
  }

  .fab {
    position: fixed;
    bottom: 1.5em;
    right: 1.5em;
    z-index: 20;
    border: 2px white solid;
  }
</style>
