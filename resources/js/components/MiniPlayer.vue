<template>

    <div>

        <p> player information placeholder </p>

        <!-- <v-select :options="[{label: 'Canada', code: 'ca'}]"></v-select> -->
        <p>{{ player }}</p>
    </div>

</template>




<script>

import Vue from "vue";
import vSelect from "vue-select";

export default {

    name: 'MiniPlayer',

    data() {
        return {
            player: this.$attrs.data
        }
    },

    // mounted() {

    //     let player_data = this.$attrs.data
    //     console.log(player_data);
    //     return player_data;
        
    // }
}
</script>
