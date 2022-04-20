<template>

    <div class="flex items-center flex flex-column">
        
        <div class="flex flex-row" id="goalkeeper-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="gk1">

                    <option v-for="goalkeeper in gks" v-bind:value="goalkeeper">{{ goalkeeper.first_name }} {{ goalkeeper.last_name }} ({{goalkeeper.team}})</option>

                </select>

                <mini-player :selected_player="gk1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="gk2">

                    <option v-for="goalkeeper in gks" v-bind:value="goalkeeper">{{ goalkeeper.first_name}} {{ goalkeeper.last_name }} ({{goalkeeper.team}})</option>
                    
                </select>

                <mini-player :selected_player="gk2"></mini-player>

            </div>
            
        </div>

        <div class="flex flex-row" id="defender-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def1">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def2">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def2"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def3">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def3"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def4">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def4"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def5">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def5"></mini-player>

            </div>

            
            
        </div>

        <div class="flex flex-row" id="midfielder-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid1">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid2">

                   <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid2"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid3">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid3"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid4">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid4"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid5">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid5"></mini-player>

            </div>

        </div>

        <div class="flex flex-row" id="forward-row">

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="fwd1">

                    <option v-for="forward in fwds" v-bind:value="forward">{{ forward.first_name }} {{ forward.last_name }} ({{forward.team}})</option>

                </select>

                <mini-player :selected_player="fwd1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="fwd2">

                    <option v-for="forward in fwds" v-bind:value="forward">{{ forward.first_name }} {{ forward.last_name }} ({{forward.team}})</option>

                </select>

                <mini-player :selected_player="fwd2"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="fwd3">

                    <option v-for="forward in fwds" v-bind:value="forward">{{ forward.first_name }} {{ forward.last_name }} ({{forward.team}})</option>

                </select>

                <mini-player :selected_player="fwd3"></mini-player>

            </div>
            
            
            
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

            gk1: '',
            gk2: '',

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

        
        


    console.log(this.goalkeepers[0]);

    },

    methods: {

        

        sendData() {
            console.log(this.gk1);
        }
    }
    
}
</script>


