<template>
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-2">
             <h1>My Posts</h1>
          </div>
          <!--se i post sono stati valorizzati, li mostro: -->
          <div class="mx-auto" v-if="posts.length>0">
            <PostCardListComponent :posts="posts" />

            <button v-if="previosPageLink" @click="goPreviousPage()" class="btn btn-primary mt-5">
                Previous
            </button>
            <button v-if="nextPageLink" @click="goNextPage()" class="btn btn-primary mt-5">
                Next
            </button>
            <div class="mt-2">
                {{currentPage}}/{{lastPage}}
            </div>

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
            posts:[],
            cuttentPage: 1,
            previosPageLink: '',
            lastPage: 1
        }
    },
    mounted() {
        console.log('mounted!!')
        this.loadPage('http://127.0.0.1:8000/api/posts');
    },
    methods: {
        loadPage(url){
            window.axios.get(url)
            .then(({status, data})=>{
                console.log(data);
                if(status===200 && data.success){
                    this.posts=data.results.data;
                    this.currentPage = data.results.current_page;
                    this.lastPage= data.results.last_page;
                    this.previosPageLink = data.results.prev_page_url;
                    this.nextPageLink = data.results.next_page_url;
            }
            }).catch(e=>{
            console.log(e);
        })
        },
        goPreviousPage(){
            this.loadPage(this.previosPageLink);
        },
        goNextPage(){
            this.loadPage(this.nextPageLink);
        }
    }

}
</script>

<style>

</style>
