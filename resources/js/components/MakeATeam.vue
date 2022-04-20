<template>

    <div class="flex items-center flex flex-column">

        <button class="text-white" @click="calcSquadCost">Calculate squad cost</button>
        <p class="text-white"> {{squadCost}} </p>
        
        <div class="flex flex-row" id="goalkeeper-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="gk1" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="goalkeeper in gks" v-bind:value="goalkeeper">{{ goalkeeper.first_name }} {{ goalkeeper.last_name }} ({{goalkeeper.team}})</option>

                </select>

                <mini-player :selected_player="gk1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="gk2" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="goalkeeper in gks" v-bind:value="goalkeeper">{{ goalkeeper.first_name}} {{ goalkeeper.last_name }} ({{goalkeeper.team}})</option>
                    
                </select>

                <mini-player :selected_player="gk2"></mini-player>

            </div>
            
        </div>

        <div class="flex flex-row" id="defender-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def1" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def2" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def2"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def3" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def3"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def4" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def4"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="def5" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="defender in defs" v-bind:value="defender">{{ defender.first_name }} {{ defender.last_name }} ({{defender.team}})</option>

                </select>

                <mini-player :selected_player="def5"></mini-player>

            </div>

            
            
        </div>

        <div class="flex flex-row" id="midfielder-row">
            
            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid1" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid2" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                   <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid2"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid3" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid3"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid4" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid4"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="mid5" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="midfielder in mids" v-bind:value="midfielder">{{ midfielder.first_name }} {{ midfielder.last_name }} ({{midfielder.team}})</option>

                </select>

                <mini-player :selected_player="mid5"></mini-player>

            </div>

        </div>

        <div class="flex flex-row" id="forward-row">

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="fwd1" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="forward in fwds" v-bind:value="forward">{{ forward.first_name }} {{ forward.last_name }} ({{forward.team}})</option>

                </select>

                <mini-player :selected_player="fwd1"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="fwd2" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

                    <option v-for="forward in fwds" v-bind:value="forward">{{ forward.first_name }} {{ forward.last_name }} ({{forward.team}})</option>

                </select>

                <mini-player :selected_player="fwd2"></mini-player>

            </div>

            <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px] flex flex-column">

                <select v-model="fwd3" class="bg-[#38003c] border-b-2 border-[#00ff85] text-[#00ff85]">

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

            squadCost: '',
        }
    },

    components: {

        MiniPlayer,

    },

    props: ['goalkeepers', 'defenders', 'midfielders', 'forwards', 'teams'],

    mounted() {


        // this.calcSquadCost();        


    // console.log(this.goalkeepers[0]);

    },

    methods: {

        sendData() {
            console.log(this.gk1);
        },

        calcSquadCost() {
            
            let keepersCost = this.gk1.current_cost + this.gk2.current_cost;
            let defendersCost = this.def1.current_cost + this.def2.current_cost + this.def3.current_cost + this.def4.current_cost + this.def5.current_cost;
            let midfieldersCost = this.mid1.current_cost + this.mid2.current_cost + this.mid3.current_cost + this.mid4.current_cost + this.mid5.current_cost;
            let forwardsCost = this.fwd1.current_cost + this.fwd2.current_cost +  this.fwd3.current_cost;

            let squadCost = keepersCost + defendersCost + midfieldersCost + forwardsCost;
            
            this.squadCost = squadCost / 10;
        }
    }
    
}
</script>


