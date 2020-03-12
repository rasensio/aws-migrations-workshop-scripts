<template>
  <form>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Username</label>
        <input type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" id="inputPassword4" />
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Database Hostname</label>
      <input type="text" class="form-control" placeholder="mydb.server.amazonaws.com" />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <router-link to="/" class="btn btn-link">Cancel</router-link>
  </form>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";

export default {
  name: "Home",
  components: {
    HelloWorld
  }
};
</script>
