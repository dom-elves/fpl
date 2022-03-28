<template>

    <div class="flex flex-row justify-around">

        <div class="bg-purple-50 w-[400px]">
        <p>{{ this.player_1[0].first_name }}</p>
        </div>

        <div class="bg-purple-50 w-[400px]">
        <p>{{ this.player_2[0].first_name }}</p>
        </div>

    </div>

</template>

<script>

    export default {
        
        props: ['player_1', 'player_2'],

        mounted() {
            console.log(this.player_1[0]);
        },

        methods: {

        },

    }
    
</script>
