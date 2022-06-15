<template>
    <div>
        <div v-for="(post, index) in posts" :key="index">
            <PostCardComponent @titleClicked="saluta($event)" :title="post.title" :content="post.content" :slug="post.slug"/>
        </div>

    </div>
</template>

<script>
import PostCardComponent from './PostCardComponent'

export default {
    name: 'PostCardListComponent',
    props: ['posts'],
    components: {PostCardComponent},
    methods: {
        saluta(value){
            console.log(value);
        }
    }
}
</script>

<style>

</style>
