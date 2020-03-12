<template>

  <div class="row">
    <div class="col-sm">
      <h2>Configuration</h2>
      <hr>
      <div class="row">
        <div class="col-8">
          <span v-if="connected"><check-circle-icon></check-circle-icon> Database connected</span>
          <span v-if="!connected"><alert-triangle-icon></alert-triangle-icon> Database disconnected</span>
        </div>
        <div class="col-4">
          <router-link to="/connection" class="btn btn-sm btn-primary">Update Connection</router-link>
        </div>
      </div>
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

import { CheckCircleIcon, AlertTriangleIcon } from 'vue-feather-icons'
import VueTerminal from 'vue-terminal-ui'  

export default {
  name: "App",
  data() {
    return {
      intro: "Migrations Workshop Terminal",
      connected: false
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
  components: {
    VueTerminal, CheckCircleIcon, AlertTriangleIcon
  }
}
</script>


<style scoped>
#terminal div {
  font-family: "Consolas" !important;
}
</style>