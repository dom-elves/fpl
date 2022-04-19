<template>

    <div>

        <p> player information placeholder </p>

        <p>{{ this.selected_player }}</p>

    </div>

</template>




<script>

import Vue from "vue";
import vSelect from "vue-select";

export default {

    name: 'MiniPlayer',

    props: ['selected_player'],

    data() {
        return {
            player: this.$attrs.data,
            
        }
    },

    mounted() {
        console.log(this.selected_player);
        let player_data = this.$attrs.data
        // console.log(this.$attrs.data);
        return player_data;
        
    }
}
</script>
