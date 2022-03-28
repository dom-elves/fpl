<template>

    <div class="flex flex-row justify-around">

        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[400px]">
            
            <p class="font-bold text-lg p-2">{{ this.player_1[0].first_name }} {{ this.player_1[0].last_name}}</p>

            <p class="font-bold p-2">Points</p>

            <div class="flex flex-row justify-around">
                <p id="player_1_total_points">Total: {{ this.player_1[0].total_points_season }}</p>
                <p>Per game: {{ this.player_1[0].points_per_game }}</p>
                <p>Bonus: {{this.player_1[0].bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p>Cost: {{ this.makeDecimal(this.player_1[0].current_cost) }}m</p>
                <p>Minutes: {{ this.player_1[0].minutes_season }}</p>
                <p>Popularity: {{this.player_1[0].percent_selected}}%</p>
            </div>

            <p class="font-bold p-2">Goals</p>

            <div class="flex flex-row justify-around">
                <p>Scored: {{this.player_1[0].goals_scored }}</p>
                <p>Assisted: {{this.player_1[0].goals_assisted }}</p>
                <p>Position: {{this.player_1[0].position }}</p>
            </div>

            <p class="font-bold p-2">Misc.</p>

            <div class="flex flex-row justify-around">
                <p>Yellows: {{this.player_1[0].yellow_cards }}</p>
                <p>Reds: {{this.player_1[0].red_cards }}</p>
                <p>Mnutes this season: {{this.player_1[0].minutes_season}}</p>
            </div>

            <p class="font-bold p-2">Transfers This Week</p>

            <div class="flex flex-row justify-around">
                <p>In: {{this.player_1[0].transfers_in_week }}</p>
                <p>Out: {{this.player_1[0].transfers_out_week }}</p>
            </div>

        </div>

        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[400px]">
            
            <p class="font-bold text-lg p-2">{{ this.player_2[0].first_name }} {{ this.player_2[0].last_name}}</p>

            <p class="font-bold p-2">Points</p>

            <div class="flex flex-row justify-around">
                <p id="player_2_total_points">Total: {{ this.player_2[0].total_points_season }}</p>
                <p>Per game: {{ this.player_2[0].points_per_game }}</p>
                <p>Bonus: {{this.player_2[0].bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p>Cost: {{ this.makeDecimal(this.player_2[0].current_cost) }}m</p>
                <p>Minutes: {{ this.player_2[0].minutes_season }}</p>
                <p>Popularity: {{this.player_2[0].percent_selected}}%</p>
            </div>

            <p class="font-bold p-2">Goals</p>

            <div class="flex flex-row justify-around">
                <p>Scored: {{this.player_2[0].goals_scored }}</p>
                <p>Assisted: {{this.player_2[0].goals_assisted }}</p>
                <p>Position: {{this.player_2[0].position }}</p>
            </div>

            <p class="font-bold p-2">Misc.</p>

            <div class="flex flex-row justify-around">
                <p>Yellows: {{this.player_2[0].yellow_cards }}</p>
                <p>Reds: {{this.player_2[0].red_cards }}</p>
                <p>Mnutes this season: {{this.player_2[0].minutes_season}}</p>
            </div>

            <p class="font-bold p-2">Transfers This Week</p>

            <div class="flex flex-row justify-around">
                <p>In: {{this.player_2[0].transfers_in_week }}</p>
                <p>Out: {{this.player_2[0].transfers_out_week }}</p>
            </div>

        </div>

    </div>

</template>

<script>

    export default {
        
        props: ['player_1', 'player_2'],

        mounted() {
            // console.log(this.player_1[0]);

            // let p1tp = document.getElementById('player_1_total_points');

            // console.log(p1tp.value());

            let player_1_cost = this.player_1[0].current_cost;
            let player_2_cost = this.player_2[0].current_cost
        },

        methods: {
            //probably a better way of doing this - come back to it 
            makeDecimal(player_cost) {
                console.log(player_cost);
                // let cost = this.player_1[0].current_cost;
                let newCost = player_cost/10;
                let decimalCost = newCost.toFixed(1);

                return decimalCost;
            },
        },

    }
    
</script>
