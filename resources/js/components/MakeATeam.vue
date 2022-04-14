<template>

    <div class="flex items-center flex flex-column">
        
        <div class="flex flex-row" id="goalkeeper-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select>

                    <option v-for="goalkeeper in gks" id="gk-1" v-model="gk1">{{ goalkeeper.first_name}} {{ goalkeeper.last_name }}</option>

                </select>

                <mini-player :data="gk1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select>

                    <option v-for="goalkeeper in gks" id="gk-2">{{ goalkeeper.first_name}} {{ goalkeeper.last_name }}</option>
                    
                </select>

                <mini-player :data="gk2"></mini-player>

            </div>
            
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
            gks: this.goalkeepers,
            defs: this.defenders,
            mids: this.midfielders,
            fwds: this.forwards,

            gk1: 'keeper 1',
            gk2: 'keeper 2',

            def1: '',
            def2: '',
            def3: '',
            def4: '',
            def5: '',

            mid1: '',
            mid2: '',
            mid3: '',
            mid4: '',
            mid5: '',

            fwd1: '',
            fwd2: '',
            fwd3: '',
            fwd4: '',
            fwd5: '',
        }
    },

    components: {

        MiniPlayer,

    },

    props: ['goalkeepers', 'defenders', 'midfielders', 'forwards', 'teams'],

    mounted() {

        // let gk1 = document.getElementById("gk-1");
        // console.log(gk1);
    }
}
</script>
