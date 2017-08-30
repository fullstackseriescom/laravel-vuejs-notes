<template>
  <div class="">
    <PageHeader/>
    <div class="container">
      <div class="row">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import PageHeader from './PageHeader.vue'

export default {
  name: 'app',
  components: {
    PageHeader
  }
}
</script>
