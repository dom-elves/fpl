<template>

    <div>

        <p> player information placeholder </p>

        <!-- <v-select :options="[{label: 'Canada', code: 'ca'}]"></v-select> -->
        <p>{{ player_data }}</p>
    </div>

</template>




<script>

import Vue from "vue";
import vSelect from "vue-select";

export default {

    name: 'MiniPlayer',

    created() {

        let player_data = this.$attrs.data
        console.log(player_data);
        return player_data;
        
    }
}
</script>
