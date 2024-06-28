<template>
  <Navigation/>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div>
           <router-view></router-view>
        </div>

      </div>
    </div>
  </div>
  </template>

<script>
import Navigation from './components/Navigation.vue';
export default {
  name: 'App',
  components : {
    Navigation
  },

};
</script>