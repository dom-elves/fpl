<template>
    <div>
        <!-- <p>{{ this.player }}</p> -->
    
        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[400px]">
            
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

        </div>
    </div>
</template>

<script>
    export default {

        props: ['player', 'player_history'],

        mounted() {
            
            console.log(this.player);
            console.log(this.player_history);
            

        },

        methods: {
            //just to display costs as decimal
            makeDecimal() {

                let cost = this.player.current_cost;
                let newCost = cost/10;
                let decimalCost = newCost.toFixed(1);
                
                return decimalCost;
            },
        },
    }
</script>