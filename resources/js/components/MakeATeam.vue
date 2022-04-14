<template>

    <div class="flex items-center flex flex-column">
        
        <div class="flex flex-row" id="goalkeeper-row">
            
            <select>
                <option v-for="goalkeeper in gk" id="gk-1">{{ goalkeeper.first_name}} {{ goalkeeper.last_name }}</option>
            </select>

            <mini-player></mini-player>

            <v-select></v-select>
            <mini-player></mini-player>
        </div>

        <div class="flex flex-row" id="defender-row">
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
        </div>

        <div class="flex flex-row" id="midfielder-row">
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
        </div>

        <div class="flex flex-row" id="forward-row">
            <mini-player></mini-player>
            <mini-player></mini-player>
            <mini-player></mini-player>
            
        </div>
        

        
    </div>

</template>

<script>

import MiniPlayer from './MiniPlayer.vue';

import Vue from "vue";
import vSelect from "vue-select";

export default {

    name: 'MakeATeam',

    data() {
        return {
            gk: this.goalkeepers,
            def: this.defenders,
            mid: this.midfielders,
            fwd: this.forwards,
        }
    },

    components: {

        MiniPlayer,

    },

    props: ['goalkeepers', 'defenders', 'midfielders', 'forwards', 'teams'],

    mounted() {

        let gk1 = document.getElementById("gk-1").innerHTML;
        console.log(gk1);
    }
}
</script>
