<template>
    <div  class="flex justify-center" id="TopTrumps.vue Container">
        
        <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] flex flex-column items-center">

            <button @click="reload()" class="text-3xl font-bold bg-green-400 text-white text-center p-4 rounded-sm my-10">New Game</button>

            <div class="flex flex-row justify-around">

                <div class="flex flex-column items-center">

                    <p class="text-white text-4xl">Player One</p>

                    <div class="flex flex-row">
                        <p class="text-white">Score: </p><p class="text-white" id="player1_score"> {{ this.score.player1}}</p>
                    </div>

                    <div class="border-2 border-[#00ff85] w-[300px] h-[470px] bg-purple-50 m-5 flex flex-column">

                        <div class="items-center flex flex-column py-5 border-b-2 border-[#00ff85]">

                            <p class="text-3xl font-bold" id="player_one_first_name">{{ this.player_one[0].first_name }}</p>
                            <p class="text-3xl font-bold" id="player_one_last_name">{{ this.player_one[0].last_name }}</p>
                            <p class="text-lg" id="player_one_position">{{ this.player_one[0].position }}</p>

                        </div>

                        <div class="p-4">

                            <p class="text-2xl mb-2" id="player_one_points" @click="playerOneStatCheck">Total Points:{{ this.player_one[0].total_points_season }}</p>
                            <p class="text-2xl mb-2" id="player_one_goals" @click="playerOneStatCheck">Goals Scored: {{ this.player_one[0].goals_scored }}</p>
                            <p class="text-2xl mb-2" id="player_one_assists" @click="playerOneStatCheck">Goals Assisted: {{ this.player_one[0].goals_assisted }}</p>
                            <p class="text-2xl mb-2" id="player_one_cost" @click="playerOneStatCheck">Cost: £{{ this.makeDecimal(this.player_one[0].current_cost) }}m</p>
                            <p class="text-2xl mb-2" id="player_one_popularity" @click="playerOneStatCheck">Popularity: {{ this.player_one[0].percent_selected }}%</p>
                            <p class="text-2xl mb-2" id="player_one_saves" @click="playerOneStatCheck">Saves: {{ this.player_one[0].saves }}</p>

                        </div>

                    </div>

                </div>

                <div class="flex flex-column items-center">

                    <p class="text-white text-4xl">Player Two</p>

                    <div class="flex flex-row">
                        <p class="text-white">Score: </p><p class="text-white"> {{ this.score.player2}}</p>
                    </div>

                    <div class="border-2 border-[#00ff85] w-[300px] h-[470px] bg-purple-50 m-5 flex flex-column">

                        <div class="items-center flex flex-column py-5 border-b-2 border-[#00ff85]">

                            <p class="text-3xl font-bold" id="player_two_first_name">{{ this.player_two[0].first_name }}</p>
                            <p class="text-3xl font-bold" id="player_two_last_name">{{ this.player_two[0].last_name }}</p>
                            <p class="text-lg" id="player_two_position">{{ this.player_two[0].position }}</p>

                        </div>

                        <div class="p-4">

                            <p class="text-2xl mb-2" id="player_two_points">Total Points: {{ this.player_two[0].total_points_season }}</p>
                            <p class="text-2xl mb-2" id="player_two_goals">Goals Scored: {{ this.player_two[0].goals_scored }}</p>
                            <p class="text-2xl mb-2" id="player_two_assists">Goals Assisted: {{ this.player_two[0].goals_assisted }}</p>
                            <p class="text-2xl mb-2" id="player_two_cost">Cost: £{{ this.makeDecimal(this.player_two[0].current_cost) }}m</p>
                            <p class="text-2xl mb-2" id="player_two_popularity">Popularity: {{ this.player_two[0].percent_selected }}%</p>
                            <p class="text-2xl mb-2" id="player_two_saves">Saves: {{ this.player_two[0].saves }}</p>

                        </div>

                    </div>

                </div>

            </div>

            <button @click="nextTurn()" class="text-3xl font-bold bg-green-400 text-white text-center p-4 rounded-sm my-10">Next Turn</button>
            
        </div>

    </div>
</template>

<script>

    export default {

        name: 'TopTrumps',
        
        props: ['player_one', 'player_two'],

        data() {
            return {
                player1: {
                    points: this.player_one[0].total_points_season,
                    goals: this.player_one[0].goals_scored,
                    assists: this.player_one[0].goals_assisted,
                    cost: this.player_one[0].current_cost,
                    popularity: this.player_one[0].percent_selected,
                    saves: this.player_one[0].saves
                },

                player2: {
                    points: this.player_two[0].total_points_season,
                    goals: this.player_two[0].goals_scored,
                    assists: this.player_two[0].goals_assisted,
                    cost: this.player_two[0].current_cost,
                    popularity: this.player_two[0].percent_selected,
                    saves: this.player_two[0].saves
                },

                score: {
                    player1: 0,
                    player2: 0,
                }
            }
        },

        created() {
            
            // console.log(this.score);

        },

        mounted() {

            console.log(this.player_one, this.player_two);

            // console.log(this.player1.popularity, this.player2.popularity);
            
        },

        methods: {

            makeDecimal(player_cost) {
            
                let newCost = player_cost/10;

                let decimalCost = newCost.toFixed(1);

                return decimalCost;

            },

            reload() {
                
                location.reload();

            },


            playerOneStatCheck(event) {
                //makes it so p1 is defined by which section was clicked on e.g. goals
                let selected_stat = event.target;
                
                let p1_score = this.score.player1;
                let p2_score = this.score.player2;

                // console.log(p1_score, p2_score, 'beginning of check');
                //checks higher/lower on total points
                if (selected_stat.id == "player_one_points") {
                    console.log(this.player_one[0].total_points_season, this.player_two[0].total_points_season);
                    let player_two = document.getElementById('player_two_points');
                   
                    if (this.player_one[0].total_points_season > this.player_two[0].total_points_season) {

                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.player_one.push(this.player_two.shift());
                        this.player_one.push(this.player_one.shift());
                        
                        p1_score++;
                        console.log(this.player_one[0], this.player_two[0]);
                        console.log(p1_score);
                        document.getElementById("player1_score").innerHTML = p1_score;
                        
                    }

                    if (this.player_one[0].total_points_season < this.player_two[0].total_points_season) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');

                        this.player_two.push(this.player_two.shift());
                        this.player_two.push(this.player_one.shift());
                        
                    }

                    if (this.player_one[0].total_points_season == this.player_two[0].total_points_season) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                    
                }

                //checks higher/lower on goals
                if (selected_stat.id == "player_one_goals") {

                    let player_two = document.getElementById('player_two_goals');
                    
                    if (this.player_one[0].goals_scored > this.player_two[0].goals_scored) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.player_one.push(this.player_two.shift());
                        this.player_one.push(this.player_one.shift());
                    }

                    if (this.player_one[0].goals_scored < this.player_two[0].goals_scored) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');

                        this.player_two.push(this.player_two.shift());
                        this.player_two.push(this.player_one.shift());
                    }

                    if (this.player_one[0].goals_scored == this.player_two[0].goals_scored) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks higher/lower on assists
                if (selected_stat.id == "player_one_assists") {

                    let player_two = document.getElementById('player_two_assists');
                    
                    if (this.player_one[0].goals_assisted > this.player_two[0].goals_assisted) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.player_one.push(this.player_two.shift());
                        this.player_one.push(this.player_one.shift());
                    }

                    if (this.player_one[0].goals_assisted < this.player_two[0].goals_assisted) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');

                        this.player_two.push(this.player_two.shift());
                        this.player_two.push(this.player_one.shift());
                    }

                    if (this.player_one[0].goals_assisted == this.player_two[0].goals_assisted) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //cehcks higher/lower on cost
                if (selected_stat.id == "player_one_cost") {

                    let player_two = document.getElementById('player_two_cost');
                    
                    if (this.player_one[0].current_cost > this.player_two[0].current_cost) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.player_one.push(this.player_two.shift());
                        this.player_one.push(this.player_one.shift());
                    }

                    if (this.player_one[0].current_cost < this.player_two[0].current_cost) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');

                        this.player_two.push(this.player_two.shift());
                        this.player_two.push(this.player_one.shift());
                    }

                    if (this.player_one[0].current_cost == this.player_two[0].current_cost) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks higher/lower on popularity
                if (selected_stat.id == "player_one_popularity") {

                    let player_two = document.getElementById('player_two_popularity');
                    
                    if (this.player_one[0].percent_selected > this.player_two[0].percent_selected) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.player_one.push(this.player_two.shift());
                        this.player_one.push(this.player_one.shift());
                    }

                    if (this.player_one[0].percent_selected < this.player_two[0].percent_selected) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');

                        this.player_two.push(this.player_two.shift());
                        this.player_two.push(this.player_one.shift());
                    }

                    if (this.player_one[0].percent_selected == this.player_two[0].percent_selected) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks high/lower on saves
                if (selected_stat.id == "player_one_saves") {

                    let player_two = document.getElementById('player_two_saves');
                    
                    if (this.player_one[0].saves > this.player_two[0].saves) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.player_one.push(this.player_two.shift());
                        this.player_one.push(this.player_one.shift());
                    }

                    if (this.player_one[0].saves < this.player_two[0].saves) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');

                        this.player_two.push(this.player_two.shift());
                        this.player_two.push(this.player_one.shift());
                    }

                    if (this.player_one[0].saves == this.player_two[0].saves) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }
                console.log(p1_score, p2_score);
                // return p1_score, p2_score;
                console.log(this.player_one, this.player_two);
            },

            nextTurn() {

                //variables so text is included
                let points_text = "Total Points: ";
                let goals_text = "Goals Scored: ";
                let assists_text = "Goals Assisted: ";
                let cost_text = "Cost: £";
                let popularity_text = "Popularity: ";
                let saves_text = "Saves: ";
            
                //p1 fields
                let p1_first_name = document.getElementById('player_one_first_name');
                let p1_last_name = document.getElementById('player_one_last_name');
                let p1_position = document.getElementById('player_one_position');
                let p1_points = document.getElementById('player_one_points');
                let p1_goals = document.getElementById('player_one_goals');
                let p1_assists = document.getElementById('player_one_assists');
                let p1_cost = document.getElementById('player_one_cost');
                let p1_popularity = document.getElementById('player_one_popularity');
                let p1_saves = document.getElementById('player_one_saves');

                //changing p1 card
                p1_first_name.innerHTML = this.player_one[0].first_name;
                p1_last_name.innerHTML = this.player_one[0].last_name;
                p1_position.innerHTML = this.player_one[0].position;
                p1_points.innerHTML = points_text.concat(this.player_one[0].total_points_season);
                p1_goals.innerHTML = goals_text.concat(this.player_one[0].goals_scored);
                p1_assists.innerHTML = assists_text.concat(this.player_one[0].goals_assisted);
                p1_cost.innerHTML = cost_text.concat(this.player_one[0].current_cost);
                p1_popularity.innerHTML = popularity_text.concat(this.player_one[0].percent_selected);
                p1_saves.innerHTML = saves_text.concat(this.player_one[0].saves);

                //p2 fields
                let p2_first_name = document.getElementById('player_two_first_name');
                let p2_last_name = document.getElementById('player_two_last_name');
                let p2_position = document.getElementById('player_two_position');
                let p2_points = document.getElementById('player_two_points');
                let p2_goals = document.getElementById('player_two_goals');
                let p2_assists = document.getElementById('player_two_assists');
                let p2_cost = document.getElementById('player_two_cost');
                let p2_popularity = document.getElementById('player_two_popularity');
                let p2_saves = document.getElementById('player_two_saves');

                //changing p2 card
                p2_first_name.innerHTML = this.player_two[0].first_name;
                p2_last_name.innerHTML = this.player_two[0].last_name;
                p2_position.innerHTML = this.player_two[0].position;
                p2_points.innerHTML = points_text.concat(this.player_two[0].total_points_season);
                p2_goals.innerHTML = goals_text.concat(this.player_two[0].goals_scored);
                p2_assists.innerHTML = assists_text.concat(this.player_two[0].goals_assisted);
                p2_cost.innerHTML = cost_text.concat(this.player_two[0].current_cost);
                p2_popularity.innerHTML = popularity_text.concat(this.player_two[0].percent_selected);
                p2_saves.innerHTML = saves_text.concat(this.player_two[0].saves);

                //clearing highlights at end of turn
                if (p1_points.classList.contains('higher')) {
                    p1_points.classList.remove('higher');
                }

                if (p1_points.classList.contains('lower')) {
                    p1_points.classList.remove('lower');
                }

                if (p1_points.classList.contains('equal')) {
                    p1_points.classList.remove('equal');
                }

                if (p1_goals.classList.contains('higher')) {
                    p1_goals.classList.remove('higher');
                }

                if (p1_goals.classList.contains('lower')) {
                    p1_goals.classList.remove('lower');
                }

                if (p1_goals.classList.contains('equal')) {
                    p1_goals.classList.remove('equal');
                }

                if (p1_assists.classList.contains('higher')) {
                    p1_assists.classList.remove('higher');
                }

                if (p1_assists.classList.contains('lower')) {
                    p1_assists.classList.remove('lower');
                }

                if (p1_assists.classList.contains('equal')) {
                    p1_assists.classList.remove('equal');
                }

                if (p1_cost.classList.contains('higher')) {
                    p1_cost.classList.remove('higher');
                }

                if (p1_cost.classList.contains('lower')) {
                    p1_cost.classList.remove('lower');
                }

                if (p1_cost.classList.contains('equal')) {
                    p1_cost.classList.remove('equal');
                }

                if (p1_cost.classList.contains('higher')) {
                    p1_cost.classList.remove('higher');
                }

                if (p1_popularity.classList.contains('lower')) {
                    p1_popularity.classList.remove('lower');
                }

                if (p1_popularity.classList.contains('higher')) {
                    p1_popularity.classList.remove('higher');
                }

                if (p1_popularity.classList.contains('equal')) {
                    p1_popularity.classList.remove('equal');
                }

                if (p1_saves.classList.contains('higher')) {
                    p1_saves.classList.remove('higher');
                }

                if (p1_saves.classList.contains('lower')) {
                    p1_saves.classList.remove('lower');
                }

                if (p1_saves.classList.contains('equal')) {
                    p1_saves.classList.remove('equal');
                }

                //clearing p2 highlights at end of turn
                if (p2_points.classList.contains('higher')) {
                    p2_points.classList.remove('higher');
                }

                if (p2_points.classList.contains('lower')) {
                    p2_points.classList.remove('lower');
                }

                if (p2_points.classList.contains('equal')) {
                    p2_points.classList.remove('equal');
                }

                if (p2_goals.classList.contains('higher')) {
                    p2_goals.classList.remove('higher');
                }

                if (p2_goals.classList.contains('lower')) {
                    p2_goals.classList.remove('lower');
                }

                if (p2_goals.classList.contains('equal')) {
                    p2_goals.classList.remove('equal');
                }

                if (p2_assists.classList.contains('higher')) {
                    p2_assists.classList.remove('higher');
                }

                if (p2_assists.classList.contains('lower')) {
                    p2_assists.classList.remove('lower');
                }

                if (p2_assists.classList.contains('equal')) {
                    p2_assists.classList.remove('equal');
                }

                if (p2_cost.classList.contains('higher')) {
                    p2_cost.classList.remove('higher');
                }

                if (p2_cost.classList.contains('lower')) {
                    p2_cost.classList.remove('lower');
                }

                if (p2_cost.classList.contains('equal')) {
                    p2_cost.classList.remove('equal');
                }

                if (p2_popularity.classList.contains('higher')) {
                    p2_popularity.classList.remove('higher');
                }

                if (p2_popularity.classList.contains('lower')) {
                    p2_popularity.classList.remove('lower');
                }

                if (p2_popularity.classList.contains('equal')) {
                    p2_popularity.classList.remove('equal');
                }

                if (p2_saves.classList.contains('higher')) {
                    p2_saves.classList.remove('higher');
                }

                if (p2_saves.classList.contains('lower')) {
                    p2_saves.classList.remove('lower');
                }

                if (p2_saves.classList.contains('equal')) {
                    p2_saves.classList.remove('equal');
                }
                
            }
        }

    }

</script>

<style scoped>

    .higher {
        background-color: #6ff294;
    }

    .lower {
        background-color: #f0484b;
    }

    .equal {
        background-color: #f3f57f;
    }
</style>
