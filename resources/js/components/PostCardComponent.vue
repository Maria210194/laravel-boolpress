<template>
  <div>
      <div class="container">
          <div class="row my-1">
            <h5 class="cont">
                {{title}}
            </h5>
          </div>
          <div>
              <p>
                  {{trimedContent + ' ...'}}
              </p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'PostCardComponent',
    props: ['title' , 'content'],
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

