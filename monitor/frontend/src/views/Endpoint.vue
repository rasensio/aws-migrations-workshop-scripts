<template>
  <form>
    <div class="alert alert-danger" v-if="error">{{error}}</div>
    <div class="form-group">
      <label for="inputAddress">Endpoint</label>
      <input type="text" class="form-control" placeholder="myendpoint.server.amazonaws.com" v-model="endpoint"/>
    </div>
    <button type="button" @click="setEndpoint()" class="btn btn-primary">Update</button>
    <router-link to="/" class="btn btn-link">Cancel</router-link>
  </form>
</template>


<script>
import api from "../api"

export default {
  methods: {
    setEndpoint() {
      try {
        let res = api.setEndpoint(this.endpoint)
        console.log(res);
        
        // this.$router.push('/')

      } catch (e) {
        this.error = e.message
      }
    }
  },
  data() {
    return {
      endpoint: null,
      error: null
    }
  }
}
</script>
