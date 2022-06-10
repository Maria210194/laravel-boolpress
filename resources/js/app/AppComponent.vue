<template>
<div>
    <div class="mb-1">
        <HeaderComponent />
    </div>
    <router-view></router-view>
</div>

</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue'

export default {
    name: 'AppComponent',
    components: {HeaderComponent}
}
</script>

<style lang="scss" scoped>

</style>

