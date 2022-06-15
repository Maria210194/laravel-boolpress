<template>
    <div class="container">
        <div class="row">
            <div v-if="category" class="col-12 mb-2">
                <h3>
                    {{category.name}}
                </h3>
                <PostCardListComponent :posts="posts" />
            </div>
            <div v-else>
                Caricamento in corso
            </div>
        </div>
    </div>

</template>

<script>
import PostCardListComponent from '../components/PostCardListComponent';

export default {
    name: 'PostsPerCategoryComponent',
        data(){
        return {category: undefined, posts:[]}
    },
    components: {PostCardListComponent},

    mounted(){
        const id = this.$route.params.id;
        console.log('mounted with id: ', id);

        window.axios.get('http://127.0.0.1:8000/api/categories/' + id)
        .then(({status, data})=>{
            console.log(data);
            if(status === 200 && data.success){
                this.category=data.results.category;
                this.posts = data.results.posts.data;
            }
        }).catch(e=>{
            console.log(e);
        })

    }

}
</script>

<style>

</style>
