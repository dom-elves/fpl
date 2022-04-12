<template>
    <div>
        <!-- <p>{{ this.player }}</p> -->
    
        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[800px]">
            
            <p class="font-bold text-lg p-2">{{ this.player.first_name }} {{ this.player.last_name}}</p>

            <p class="font-bold p-2">Points</p>

            <div class="flex flex-row justify-around">
                <p>Total: {{ this.player.total_points_season }}</p>
                <p>Per game: {{ this.player.points_per_game }}</p>
                <p>Bonus: {{this.player.bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p>Cost: {{ this.makeDecimal() }}m</p>
                <p>Minutes: {{ this.player.minutes_season }}</p>
                <p>Popularity: {{this.player.percent_selected}}%</p>
            </div>
            
            <line-chart :data="player_gameweeks"></line-chart>
            

        </div>
    </div>
</template>

<script>

import Vue from 'vue'
import Chartkick from 'vue-chartkick'
import Chart from 'chart.js'


    export default {

        data() {

           return {
               player_gameweeks: this.player_history
           }

       },

        props: ['player', 'player_history'],

        created() {

            this.generateBarChatData();
            

        },

        mounted() {
            
            console.log(this.player);
            
            
            
        },

        methods: {
            //just to display costs as decimal
            makeDecimal() {

                let cost = this.player.current_cost;
                let newCost = cost/10;
                let decimalCost = newCost.toFixed(1);
                
                return decimalCost;
            },

            generateBarChatData() {
                // console.log(Object.keys(this.player_history));

                //remove uneccessary elements
                delete this.player_history['id'];
                delete this.player_history['player_id'];
                delete this.player_history['first_name'];
                delete this.player_history['last_name'];
                // console.log(this.player_history);

               
                

                console.log(this.player_history);
               
            }
        },
    }
</script>