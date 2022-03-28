<template>

    <div class="flex flex-row justify-around">

        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[400px]">
            
            <p class="font-bold text-lg p-2">{{ this.player_1[0].first_name }} {{ this.player_1[0].last_name}}</p>

            <p class="font-bold p-2">Points</p>

            <div class="flex flex-row justify-around">
                <p>Total: {{ this.player_1[0].total_points_season }}</p>
                <p>Per game: {{ this.player_1[0].points_per_game }}</p>
                <p>Bonus: {{this.player_1[0].bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p>Cost: {{ this.makeDecimal() }}m</p>
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
                <p>Total: {{ this.player_2[0].total_points_season }}</p>
                <p>Per game: {{ this.player_2[0].points_per_game }}</p>
                <p>Bonus: {{this.player_2[0].bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p>Cost: {{ this.makeDecimal() }}m</p>
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
            console.log(this.player_1[0]);
        },

        methods: {
            //probably a better way of doing this - come back to it 
            makeDecimal() {

                let cost_1 = this.player_1[0].current_cost;
                let newCost_1 = cost_1/10;
                let decimalCost_1 = newCost_1.toFixed(1);

                let cost_2 = this.player_2[0].current_cost;
                let newCost_2 = cost_2/10;
                let decimalCost_2 = newCost_2.toFixed(1);

                return decimalCost_1, decimalCost_2;
            },
        },

    }
    
</script>
