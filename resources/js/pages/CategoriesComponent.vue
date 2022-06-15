<template>
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-2">
              Categories
          </div>
          <!--se i post sono stati valorizzati, li mostro: -->
          <div v-if="categories.length>0">
              <ul>
                    <li v-for="category in categories" :key="category.id">
                        <router-link :to="{
                            name:'post-per-category',
                            params: {id: category.id}
                            }">
                        {{category.name}}
                        </router-link>
                    </li>
              </ul>
          </div>

            <!--altrimenti mostro: -->
          <div v-else>
              Caricamento in corso
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'CategoriesComponent',
    data(){
        return {
            categories:[]
        }
    },
    mounted() {
        console.log('mounted!!')
        this.loadPage('http://127.0.0.1:8000/api/categories');
    },
    methods: {
        loadPage(url){
            window.axios.get(url)
            .then(({status, data})=>{
                console.log(data);
                if(status===200 && data.success){
                    this.categories=data.results;
            }
            }).catch(e=>{
            console.log(e);
        })
        }
    }
}
</script>

<style>

</style>
