<template>
  <div class="container">
      <div class="row">
          <div class="col-12 text-center mb-2">
              My Posts
          </div>
          <!--se i post sono stati valorizzati, li mostro: -->
          <div v-if="post">
            <h3>
                {{post.title}}
            </h3>
            <p>
                {{post.content}}
            </p>
            <div class="my-2">
                Category: {{post.category.name}}
            </div>
            <div>
                Tags:
                <ul>
                    <li v-for="tag in post.tags" :key="tag.id">
                        {{tag.name}}
                    </li>
                </ul>
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
export default {
    name: 'SingleBlogComponent',
    data(){
        return {post: undefined}
    },

    mounted(){
        const id = this.$route.params.id;
        console.log('mounted with id: ', id);

        window.axios.get('http://127.0.0.1:8000/api/posts/' + id)
        .then(({status, data})=>{
            console.log(data);
            if(status === 200 && data.success){
                this.post=data.results;
            }
        }).catch(e=>{
            console.log(e);
        })

    }

}
</script>

<style>

</style>
