<template>
  <div>
      <div class="container">
          <div class="row my-1">
            <h4 class="cont mt-4">
                {{title}}
            </h4>
          </div>
          <div>
              <p>
                  {{trimedContent + ' ...'}}
              </p>
          </div>
          <router-link :to="{ name:'single-blog', params: {id} }"> Visualizza</router-link>
      </div>
  </div>
</template>

<script>
export default {
    name: 'PostCardComponent',
    props: ['title', 'content', 'id'],
    computed: {
        trimedContent(){
            const shortContent = this.content.length>30 ? this.content.substring(0, 30) : this.content
            return shortContent;
        }
    }
}
</script>

<style lang="scss" scoped>
.cont{
    width: 100px;
}

</style>

