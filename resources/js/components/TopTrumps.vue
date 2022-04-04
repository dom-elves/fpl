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

                            <button class="text-2xl mb-2" id="player_one_points" @click="playerOneStatCheck(player1.points, player2.points, event)">Total Points: {{ this.player_one[0].total_points_season }}</button>
                            <p class="text-2xl mb-2" id="player_one_goals">Goals Scored: {{ this.player_one[0].goals_scored }}</p>
                            <p class="text-2xl mb-2" id="player_one_assists">Goals Assisted: {{ this.player_one[0].goals_assisted }}</p>
                            <p class="text-2xl mb-2" id="player_one_cost">Cost: £{{ this.makeDecimal(this.player_one[0].current_cost) }}m</p>
                            <p class="text-2xl mb-2" id="player_one_popularity">Popularity: {{ this.player_one[0].percent_selected }}%</p>
                            <p class="text-2xl mb-2" id="player_one_saves">Saves: {{ this.player_one[0].saves }}</p>

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

                            <p class="text-2xl mb-2">Total Points: {{ this.player_two[0].total_points_season }}</p>
                            <p class="text-2xl mb-2">Goals Scored: {{ this.player_two[0].goals_scored }}</p>
                            <p class="text-2xl mb-2">Goals Assisted: {{ this.player_two[0].goals_assisted }}</p>
                            <p class="text-2xl mb-2">Cost: £{{ this.makeDecimal(this.player_two[0].current_cost) }}m</p>
                            <p class="text-2xl mb-2">Popularity: {{ this.player_two[0].percent_selected }}%</p>
                            <p class="text-2xl mb-2">Saves: {{ this.player_two[0].saves }}</p>

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

            this.testMethod();
            console.log();
            
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

            playerOneStatCheck(p1_stat, p2_stat, event) {
                console.log(event.target);
                
                if (p1_stat > p2_stat) {
                    console.log('add p1 css');
                    
                  
                }

                if (p1_stat < p2_stat) {
                    console.log('add p2 css');
                }

                if (p1_stat == p2_stat) {
                    console.log('add even css');
                }
        
            },
        }

    }

</script>
