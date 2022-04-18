<template>

    <div class="flex items-center flex flex-column">
        
        <div class="flex flex-row" id="goalkeeper-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select id="gk-1">

                    <option v-for="goalkeeper in gks">{{ goalkeeper.first_name }} {{ goalkeeper.last_name }} ({{goalkeeper.team}})</option>

                </select>

                <mini-player :data="gk1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select id="gk-2">

                    <option v-for="goalkeeper in gks">{{ goalkeeper.first_name}} {{ goalkeeper.last_name }} ({{goalkeeper.team}})</option>
                    
                </select>

                <mini-player :data="gk2"></mini-player>

            </div>
            
        </div>

        <div class="flex flex-row" id="defender-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select id="gk-1">

                    <option v-for="defender in defs">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :data="gk1"></mini-player>

            </div>

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

        console.log(this.goalkeepers);

    //move this into a watch

    },

    methods: {

        dropdowns() {
            
            gk_1.addEventListener('onchange', test);
        },

        test() {

            let gk_1 = document.getElementById("gk-1");
            let selected_gk =  gk_1.options[ gk_1.selectedIndex ].value;
            console.log(selected_gk);
            
        }
    }
    
}
</script>
