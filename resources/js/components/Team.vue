<template>
    <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[270px]" :id="getTeamName()">
        
        <!-- {{ this.team[0].team_name }} 
        
        {{ this.team[1] }} -->
        
    </div>
</template>

<script>
    export default {

        props: ['team'],

        mounted() {
            
            // console.log(this.team);
            // this.getTeamName();

            // this.getPlayers();
            console.log(this.team[1]);
        },

        methods: {

            getTeamName() {
                let teamName = this.team[0].team_name
                return teamName;
            },

            getPlayers() {
                let players = this.team[1];
                // console.log(players);

                for (const player in players) {
                    console.log(players[player]);
                    let team = this.team[0].team_name;
                    
                    let teamDiv = document.getElementById(team);
                    
                    let playerElement = document.createElement("player");
                    let text = document.createTextNode("test");
                    playerElement.appendChild(text);
                    teamDiv.appendChild(playerElement);
                }
            }
        }
    }
</script>