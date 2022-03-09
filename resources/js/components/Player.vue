<template>
    <div class="container">
        <p>player component</p>
        <p>{{ this.player }}</p>
    </div>
</template>

<script>
    export default {

        props: ['player'],

        mounted() {
            
            console.log(this.player);
        }
    }
</script>