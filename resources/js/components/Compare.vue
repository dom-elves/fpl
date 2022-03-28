<template>

    <div class="flex flex-row justify-around">

        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[400px]">
            
            <p class="font-bold text-lg p-2">{{ this.player_1[0].first_name }} {{ this.player_1[0].last_name}}</p>

            <p class="font-bold p-2">Points</p>

            <div class="flex flex-row justify-around">
                <p id="player_1_total_points">Total: {{ this.player_1[0].total_points_season }}</p>
                <p id="player_1_ppg">Per game: {{ this.player_1[0].points_per_game }}</p>
                <p id="player_1_bonus_season">Bonus: {{this.player_1[0].bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p id="player_1_cost">Cost: {{ this.makeDecimal(this.player_1[0].current_cost) }}m</p>
                <p id="player_1_popularity">Popularity: {{this.player_1[0].percent_selected}}%</p>
            </div>

            <p class="font-bold p-2">Goals</p>

            <div class="flex flex-row justify-around">
                <p id="player_1_goals_scored">Scored: {{this.player_1[0].goals_scored }}</p>
                <p id="player_1_goals_assisted">Assisted: {{this.player_1[0].goals_assisted }}</p>
                <p>Position: {{this.player_1[0].position }}</p>
            </div>

            <p class="font-bold p-2">Misc.</p>

            <div class="flex flex-row justify-around">
                <p id="player_1_yellows">Yellows: {{this.player_1[0].yellow_cards }}</p>
                <p id="player_1_reds">Reds: {{this.player_1[0].red_cards }}</p>
                <p id="player_1_minutes">Mnutes this season: {{this.player_1[0].minutes_season}}</p>
            </div>

            <p class="font-bold p-2">Transfers This Week</p>

            <div class="flex flex-row justify-around">
                <p id="player_1_transfers_in">In: {{this.player_1[0].transfers_in_week }}</p>
                <p id="player_1_transfers_out">Out: {{this.player_1[0].transfers_out_week }}</p>
            </div>

        </div>

        <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[400px]">
            
            <p class="font-bold text-lg p-2">{{ this.player_2[0].first_name }} {{ this.player_2[0].last_name}}</p>

            <p class="font-bold p-2">Points</p>

            <div class="flex flex-row justify-around">
                <p id="player_2_total_points">Total: {{ this.player_2[0].total_points_season }}</p>
                <p id="player_2_ppg">Per game: {{ this.player_2[0].points_per_game }}</p>
                <p id="player_2_bonus_season">Bonus: {{this.player_2[0].bonus_points_season }}</p>
            </div>

            <p class="font-bold p-2">Data</p>

            <div class="flex flex-row justify-around">
                <p id="player_2_cost">Cost: {{ this.makeDecimal(this.player_2[0].current_cost) }}m</p>
                <p id="player_2_popularity">Popularity: {{this.player_2[0].percent_selected}}%</p>
            </div>

            <p class="font-bold p-2">Goals</p>

            <div class="flex flex-row justify-around">
                <p id="player_2_goals_scored">Scored: {{this.player_2[0].goals_scored }}</p>
                <p id="player_2_goals_assisted">Assisted: {{this.player_2[0].goals_assisted }}</p>
                <p>Position: {{this.player_2[0].position }}</p>
            </div>

            <p class="font-bold p-2">Misc.</p>

            <div class="flex flex-row justify-around">
                <p id="player_2_yellows">Yellows: {{this.player_2[0].yellow_cards }}</p>
                <p id="player_2_reds">Reds: {{this.player_2[0].red_cards }}</p>
                <p id="player_2_minutes">Mnutes this season: {{this.player_2[0].minutes_season}}</p>
            </div>

            <p class="font-bold p-2">Transfers This Week</p>

            <div class="flex flex-row justify-around">
                <p id="player_2_transfers_in">In: {{this.player_2[0].transfers_in_week }}</p>
                <p id="player_2_transfers_out">Out: {{this.player_2[0].transfers_out_week }}</p>
            </div>

        </div>

    </div>

</template>

<script>

    export default {
        
        props: ['player_1', 'player_2'],

        mounted() {

            this.checkTotalPoints();

            this.checkPointsPerGame();

            this.checkTotalBonusPoints();

            this.checkCurrentCost();

            this.checkPopularity();

            this.checkGoalsScored();

            this.checkGoalsAssisted();

            this.checkYellowCards();

            this.checkRedCards();

            this.checkMinutes();

            this.checkTransfersIn();

            this.checkTransfersOut();
        },

        methods: {
        
            makeDecimal(player_cost) {
                
                let newCost = player_cost/10;

                let decimalCost = newCost.toFixed(1);

                return decimalCost;
            },

            checkTotalPoints() {

                let player_1_total_points = document.getElementById('player_1_total_points');
                let player_2_total_points = document.getElementById('player_2_total_points');

                if ( this.player_1[0].total_points_season > this.player_2[0].total_points_season) {
                    player_1_total_points.classList.add('higher');
                    player_2_total_points.classList.add('lower');
                }

                if ( this.player_1[0].total_points_season < this.player_2[0].total_points_season) {
                    player_1_total_points.classList.add('lower');
                    player_2_total_points.classList.add('higher');
                }

                if ( this.player_1[0].total_points_season == this.player_2[0].total_points_season) {
                    player_1_total_points.classList.add('even');
                    player_2_total_points.classList.add('even');
                }

            },

            checkPointsPerGame() {

                let player_1_ppg = document.getElementById('player_1_ppg');
                let player_2_ppg = document.getElementById('player_2_ppg');

                if ( this.player_1[0].points_per_game > this.player_2[0].points_per_game) {
                    player_1_ppg.classList.add('higher');
                    player_2_ppg.classList.add('lower');
                }

                if ( this.player_1[0].points_per_game < this.player_2[0].points_per_game) {
                    player_1_ppg.classList.add('lower');
                    player_2_ppg.classList.add('higher');
                }

                if ( this.player_1[0].points_per_game == this.player_2[0].points_per_game) {
                    player_1_ppg.classList.add('even');
                    player_2_ppg.classList.add('even');
                }

            },

            checkTotalBonusPoints() {

                let player_1_bs = document.getElementById('player_1_bonus_season');
                let player_2_bs = document.getElementById('player_2_bonus_season');

                if ( this.player_1[0].bonus_points_season > this.player_2[0].bonus_points_season) {
                    player_1_bs.classList.add('higher');
                    player_2_bs.classList.add('lower');
                }

                if ( this.player_1[0].bonus_points_season < this.player_2[0].bonus_points_season) {
                    player_1_bs.classList.add('lower');
                    player_2_bs.classList.add('higher');
                }

                if ( this.player_1[0].bonus_points_season == this.player_2[0].bonus_points_season) {
                    player_1_bs.classList.add('even');
                    player_2_bs.classList.add('even');
                }

            },

            checkCurrentCost() {

                let player_1_cost = document.getElementById('player_1_cost');
                let player_2_cost = document.getElementById('player_2_cost');

                if ( this.player_1[0].current_cost > this.player_2[0].current_cost) {
                    player_1_cost.classList.add('higher');
                    player_2_cost.classList.add('lower');
                }

                if ( this.player_1[0].current_cost < this.player_2[0].current_cost) {
                    player_1_cost.classList.add('lower');
                    player_2_cost.classList.add('higher');
                }

                if ( this.player_1[0].current_cost == this.player_2[0].current_cost) {
                    player_1_cost.classList.add('even');
                    player_2_cost.classList.add('even');
                }

            },

            checkPopularity() {

                let player_1_popularity = document.getElementById('player_1_popularity');
                let player_2_popularity = document.getElementById('player_2_popularity');

                if ( this.player_1[0].percent_selected > this.player_2[0].percent_selected) {
                    player_1_popularity.classList.add('higher');
                    player_2_popularity.classList.add('lower');
                }

                if ( this.player_1[0].percent_selected < this.player_2[0].percent_selected) {
                    player_1_popularity.classList.add('lower');
                    player_2_popularity.classList.add('higher');
                }

                if ( this.player_1[0].percent_selected == this.player_2[0].percent_selected) {
                    player_1_popularity.classList.add('even');
                    player_2_popularity.classList.add('even');
                }

            },

            checkGoalsScored() {

                let player_1_gs = document.getElementById('player_1_goals_scored');
                let player_2_gs = document.getElementById('player_2_goals_scored');

                if ( this.player_1[0].goals_scored > this.player_2[0].goals_scored) {
                    player_1_gs.classList.add('higher');
                    player_2_gs.classList.add('lower');
                }

                if ( this.player_1[0].goals_scored < this.player_2[0].goals_scored) {
                    player_1_gs.classList.add('lower');
                    player_2_gs.classList.add('higher');
                }

                if ( this.player_1[0].goals_scored== this.player_2[0].goals_scored) {
                    player_1_gs.classList.add('even');
                    player_2_gs.classList.add('even');
                }

            },

            checkGoalsAssisted() {

                let player_1_ga = document.getElementById('player_1_goals_assisted');
                let player_2_ga = document.getElementById('player_2_goals_assisted');

                if ( this.player_1[0].goals_assisted > this.player_2[0].goals_assisted) {
                    player_1_ga.classList.add('higher');
                    player_2_ga.classList.add('lower');
                }

                if ( this.player_1[0].goals_assisted < this.player_2[0].goals_assisted) {
                    player_1_ga.classList.add('lower');
                    player_2_ga.classList.add('higher');
                }

                if ( this.player_1[0].goals_assisted == this.player_2[0].goals_assisted) {
                    player_1_ga.classList.add('even');
                    player_2_ga.classList.add('even');
                }

            },

            checkYellowCards() {

                let player_1_yellows = document.getElementById('player_1_yellows');
                let player_2_yellows = document.getElementById('player_2_yellows');

                if ( this.player_1[0].yellow_cards  > this.player_2[0].yellow_cards ) {
                    player_1_yellows.classList.add('higher');
                    player_2_yellows.classList.add('lower');
                }

                if ( this.player_1[0].yellow_cards  < this.player_2[0].yellow_cards ) {
                    player_1_yellows.classList.add('lower');
                    player_2_yellows.classList.add('higher');
                }

                if ( this.player_1[0].yellow_cards == this.player_2[0].yellow_cards ) {
                    player_1_yellows.classList.add('even');
                    player_2_yellows.classList.add('even');
                }

            },

            checkRedCards() {

                let player_1_reds = document.getElementById('player_1_reds');
                let player_2_reds = document.getElementById('player_2_reds');

                if ( this.player_1[0].red_cards  > this.player_2[0].red_cards ) {
                    player_1_reds.classList.add('higher');
                    player_2_reds.classList.add('lower');
                }

                if ( this.player_1[0].red_cards  < this.player_2[0].red_cards ) {
                    player_1_reds.classList.add('lower');
                    player_2_reds.classList.add('higher');
                }

                if ( this.player_1[0].red_cards == this.player_2[0].red_cards ) {
                    player_1_reds.classList.add('even');
                    player_2_reds.classList.add('even');
                }

            },

            checkMinutes() {

                let player_1_minutes = document.getElementById('player_1_minutes');
                let player_2_minutes = document.getElementById('player_2_minutes');

                if ( this.player_1[0].minutes_season  > this.player_2[0].minutes_season ) {
                    player_1_minutes.classList.add('higher');
                    player_2_minutes.classList.add('lower');
                }

                if ( this.player_1[0].minutes_season  < this.player_2[0].minutes_season ) {
                    player_1_minutes.classList.add('lower');
                    player_2_minutes.classList.add('higher');
                }

                if ( this.player_1[0].minutes_season == this.player_2[0].minutes_season ) {
                    player_1_minutes.classList.add('even');
                    player_2_minutes.classList.add('even');
                }

            },

            checkTransfersIn() {

                let player_1_transfers_in = document.getElementById('player_1_transfers_in');
                let player_2_transfers_in  = document.getElementById('player_2_transfers_in');

                if ( this.player_1[0].transfers_in_week  > this.player_2[0].transfers_in_week ) {
                    player_1_transfers_in.classList.add('higher');
                    player_2_transfers_in.classList.add('lower');
                }

                if ( this.player_1[0].transfers_in_week  < this.player_2[0].transfers_in_week ) {
                    player_1_transfers_in.classList.add('lower');
                    player_2_transfers_in.classList.add('higher');
                }

                if ( this.player_1[0].transfers_in_week == this.player_2[0].transfers_in_week ) {
                    player_1_transfers_in.classList.add('even');
                    player_2_transfers_in.classList.add('even');
                }

            },

            checkTransfersOut() {

                let player_1_transfers_out = document.getElementById('player_1_transfers_out');
                let player_2_transfers_out  = document.getElementById('player_2_transfers_out');

                if ( this.player_1[0].transfers_out_week  > this.player_2[0].transfers_out_week ) {
                    player_1_transfers_out.classList.add('higher');
                    player_2_transfers_out.classList.add('lower');
                }

                if ( this.player_1[0].transfers_out_week  < this.player_2[0].transfers_out_week ) {
                    player_1_transfers_out.classList.add('lower');
                    player_2_transfers_out.classList.add('higher');
                }

                if ( this.player_1[0].transfers_out_week == this.player_2[0].transfers_out_week ) {
                    player_1_transfers_out.classList.add('even');
                    player_2_transfers_out.classList.add('even');
                }

            },
        },

    }
    
</script>

<style scoped>

    .higher {
        background-color: green;
        color: white;
    }

    .lower {
        background-color: red;
        color: white;
    }

    .even {
        background-color: yellow;
    }

</style>
