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
  <Sidebar/>
  
  </template>

<script>
import Navigation from './components/Navigation.vue';
import Sidebar from './components/Sidebar.vue';
export default {
  name: 'App',
  components : {
    Navigation,
    Sidebar,
  },

};
</script>