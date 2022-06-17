<template>
  <div>
      <div class="container">
          <div class="my-1">
            <div class="card text-center" style="width: 40rem;">
                <img
                :src="'/storage/' + cover"
                :alt="title"
                class="card-img-top w-60 h-60 mx-auto mt-4"
                />
                <div class="card-body">
                <h2 @click="click()" class=" card-title my-4">
                    {{title}}
                </h2>
                    <p class="card-text">
                        {{trimedContent + ' ...'}}
                    </p>
                </div>
                <router-link :to="{ name:'single-blog', params: {slug} }"> Visualizza</router-link>
            </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'PostCardComponent',
    props: ['title', 'content', 'slug', 'cover'],
    computed: {
        trimedContent(){
            const shortContent = this.content.length>30 ? this.content.substring(0, 30) : this.content
            return shortContent;
        }
    },
    methods: {
        click(){
            console.log('click');
            this.$emit('titleClicked', 'ciao Mary');
        }
    }
}
</script>

<style lang="scss" scoped>

</style>

