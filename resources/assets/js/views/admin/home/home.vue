<template>
    <div>
        <h2>This is home page, and login status</h2>
        <h3>{{ msg }}</h3>
        <svg class="svg-icon language" aria-hidden="true">
            <use xlink:href="#icon-language"></use>
        </svg>
    </div>
</template>

<script>
    export default {
        name: "home-home",
        data () {
            return {
                msg: 'HAHAH',
            }
        },
    }
</script>

<style scoped>

</style>
