<template>
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-2">
              My Posts
          </div>
          <!--se i post sono stati valorizzati, li mostro: -->
          <div v-if="posts.length>0">
              <PostCardListComponent :posts="posts" />
          </div>

            <!--altrimenti mostro: -->
          <div v-else>
              Caricamento in corso
          </div>
      </div>
  </div>
</template>

<script>

import PostCardListComponent from '../components/PostCardListComponent.vue'

export default {
    name: 'BlogComponent',
    components: {PostCardListComponent},
    data(){
        return {
            posts:[]
        }
    },
    mounted() {
        console.log('mounted!!')

        window.axios.get('http://127.0.0.1:8000/api/posts')
        .then(({status, data})=>{
            console.log(data);
            if(status===200 && data.success){
                this.posts=data.results;
            }
        }).catch(e=>{
            console.log(e);
        })

    }

}
</script>

<style>

</style>
