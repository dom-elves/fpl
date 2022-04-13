<template>

    <div class="flex items-center flex flex-column">
        
        <div class="flex flex-row" id="goalkeeper-row">
            <v-select :options="[{label: 'Canada', code: 'ca'}]"></v-select>
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

    components: {

        MiniPlayer,

    },

    props: ['players', 'teams'],

    mounted() {
        console.log(this.players[0], this.teams[0]);
    }
}
</script>
