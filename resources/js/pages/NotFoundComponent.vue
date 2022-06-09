<template>
  <div class="container">
      <div class="row">
          <div class="col-12 text-center my-2">
              404 - Not Found
          </div>
            <div class="col-12 text-center my-2">
              <router-link :to="{name:'home'}">Back to Home</router-link>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'NotFoundComponent'

}
</script>

<style>

</style>
