<template>
    <div>
        <!-- <p>{{ this.player }}</p> -->
    
        <div class="container">
            <p>hello</p>
            <!-- <p>{{ this.player.first_name }} {{ this.player.last_name}}</p> -->
        </div>
    </div>
</template>

<script>
    export default {

        props: ['player'],

        mounted() {
            
            // console.log(this.player);
        }
    }
</script>