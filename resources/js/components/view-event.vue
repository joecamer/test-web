<template>
  <b-modal id="view-event" :title="`Evenement : ${event.event_name}`" size="md" hide-footer>
    <div class="row">
      <div class="col-12">
        <h1>{{ event.event_name }}</h1>
        <table>
          <tr>
            <td><strong class="text-primary">Date</strong></td>
            <td>{{ event.event_date }}</td>
          </tr>
          <tr>
            <td><strong class="text-primary">Heur</strong></td>
            <td>de {{ event.start_time }}h à {{ event.end_time }}h</td>
          </tr>
          <tr>
            <td><strong class="text-primary">Lieu</strong></td>
            <td>Salle N° {{ event.room.room_number }} - Salle {{ event.room.room_name }}</td>
          </tr>
        </table>
      </div>
    </div>
  </b-modal>
</template>

<script>
  import axios from "axios"

  export default {
    name: "view-event",
    props: ['event']
  }
</script>

<style scoped>

</style>
