<template>
    <div  class="flex justify-center" id="TopTrumps.vue Container">
        
        <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] flex flex-column items-center">

            <button @click="reload()" class="text-3xl font-bold bg-green-400 text-white text-center p-4 rounded-sm my-10">New Game</button>

            <div class="flex flex-row justify-around">

                <div class="flex flex-column items-center">

                    <p class="text-white text-4xl">Player One</p>

                    <div class="border-2 border-[#00ff85] w-[300px] h-[470px] bg-purple-50 m-5 flex flex-column">

                        <div class="items-center flex flex-column py-5 border-b-2 border-[#00ff85]">

                            <p class="text-3xl font-bold">{{ this.player_one[0].first_name }}</p>
                            <p class="text-3xl font-bold">{{ this.player_one[0].last_name }}</p>
                            <p class="text-lg">{{ this.player_one[0].position }}</p>

                        </div>

                        <div class="p-4">

                            <p class="text-2xl mb-2" id="player_one_points" @click="playerOneStatCheck">Total Points: <span>{{ this.player_one[0].total_points_season }}</span></p>
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

                    <div class="border-2 border-[#00ff85] w-[300px] h-[470px] bg-purple-50 m-5 flex flex-column">

                        <div class="items-center flex flex-column py-5 border-b-2 border-[#00ff85]">

                            <p class="text-3xl font-bold">{{ this.player_two[0].first_name }}</p>
                            <p class="text-3xl font-bold">{{ this.player_two[0].last_name }}</p>
                            <p class="text-lg">{{ this.player_two[0].position }}</p>

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
                }
            }
        },

        created() {
            
            // this.shuffleAndSplit();

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


            testMethod() {
                // console.log(this.player_one, this.player_two, 'mounted');
            },

            playerOneStatCheck(event) {
                //makes it so p1 is defined by which section was clicked on e.g. goals
                let selected_stat = event.target;
                
                    // this.player_two.push(this.player_one.shift());
                    // console.log(this.player_one, this.player_two);
                //checks higher/lower on total points
                if (selected_stat.id == "player_one_points") {

                    let player_two = document.getElementById('player_two_points');
                    
                    if (this.player1.points > this.player2.points) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');

                        this.$emit('sendToPlayer1', this.player_two[0]);
                        
                    }

                    if (this.player1.points < this.player2.points) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');
                    }

                    if (this.player1.points == this.player2.points) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks higher/lower on goals
                if (selected_stat.id == "player_one_goals") {

                    let player_two = document.getElementById('player_two_goals');
                    
                    if (this.player1.goals > this.player2.goals) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');
                    }

                    if (this.player1.goals < this.player2.goals) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');
                    }

                    if (this.player1.goals == this.player2.goals) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks higher/lower on assists
                if (selected_stat.id == "player_one_assists") {

                    let player_two = document.getElementById('player_two_assists');
                    
                    if (this.player1.assists > this.player2.assists) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');
                    }

                    if (this.player1.assists < this.player2.assists) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');
                    }

                    if (this.player1.assists == this.player2.assists) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //cehcks higher/lower on cost
                if (selected_stat.id == "player_one_cost") {

                    let player_two = document.getElementById('player_two_cost');
                    
                    if (this.player1.cost > this.player2.cost) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');
                    }

                    if (this.player1.cost < this.player2.cost) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');
                    }

                    if (this.player1.cost == this.player2.cost) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks higher/lower on popularity
                if (selected_stat.id == "player_one_popularity") {

                    let player_two = document.getElementById('player_two_popularity');
                    
                    if (this.player1.popularity > this.player2.popularity) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');
                    }

                    if (this.player1.popularity < this.player2.popularity) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');
                    }

                    if (this.player1.popularity == this.player2.popularity) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }

                //checks high/lower on saves
                if (selected_stat.id == "player_one_saves") {

                    let player_two = document.getElementById('player_two_saves');
                    
                    if (this.player1.saves > this.player2.saves) {
                        event.target.classList.add('higher');
                        player_two.classList.add('lower');
                    }

                    if (this.player1.saves < this.player2.saves) {
                        event.target.classList.add('lower');
                        player_two.classList.add('higher');
                    }

                    if (this.player1.saves == this.player2.saves) {
                        event.target.classList.add('equal');
                        player_two.classList.add('equal');
                    }
                }
                
            },
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
