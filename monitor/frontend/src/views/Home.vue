<template>

  <div class="row">
    <div class="col-sm">
      <h2>Configuration <settings-icon></settings-icon></h2>
      <hr>
      <div>
        <strong>Endpoint:</strong> <code>{{endpoint}}</code>
      </div>
      <router-link to="/endpoint" class="btn btn-sm btn-primary">Update Endpoint</router-link>
      <hr>

    </div>

    <!-- the data -->
    <div class="col-sm">
      <h2>Data</h2>
      <div v-if="!connected">
        Connect your database first <router-link to="/connection">here</router-link>
      </div>
    </div>

    <!-- terminal -->
    <div class="col-sm">
      <h2>Terminal</h2>
      <VueTerminal
        :intro="intro"
        console-sign="$"
        allow-arbitrary
        height="500px"
        @command="onCommand">
      </VueTerminal>

    </div>
  </div>    
</template>

<script>

import { CheckCircleIcon, AlertTriangleIcon, SettingsIcon } from 'vue-feather-icons'
import VueTerminal from 'vue-terminal-ui'  
import api from "../api"

export default {
  name: "App",
  data() {
    return {
      intro: "Migrations Workshop Terminal",
      connected: false,
      endpoint: null
    }
  },
  methods: {
    onCommand(data, resolve, reject) {
      console.log(data);
      setTimeout(() => {
        resolve("");
      }, 300);
    }
  },

  created() {
    this.endpoint = api.getEndpoint().endpoint
  },

  components: {
    VueTerminal, CheckCircleIcon, AlertTriangleIcon, SettingsIcon
  }

}
</script>


<style scoped>
#terminal div {
  font-family: "Consolas" !important;
}
</style>