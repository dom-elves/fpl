<template>
    <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50">
        
        <p class="font-bold border-b-2 border-[#00ff85] p-1">Gameweek {{ this.gameweek.id }}</p>

        <div class="border-b-2 border-[#00ff85] p-1">
            <p class="font-bold">Highest Scoring squad</p>
            <p>{{ this.gameweek.highest_team_points }}</p>
        </div>

        <div class="border-b-2 border-[#00ff85] p-1">
            <p class="font-bold">Average Squad Score</p>
            <p>{{ this.gameweek.average_team_points }}</p>
        </div>
     
        <div class="border-b-2 border-[#00ff85] p-1">    
            <p class="font-bold">Most Selected Player</p>
            <!-- <p id="ewrr {{this.gameweek.most_selected_player.player_name}}">{{ this.gameweek.most_selected_player.player_name }}</p> -->
            <p :id="generateMostSelectedPlayerId()">{{ this.gameweek.most_selected_player.player_name }}</p>
        </div>

        <div class="border-b-2 border-[#00ff85] p-1">       
            <p class="font-bold">Highest Scoring Player </p>
            <p :id="generateHighestScoringPlayerId()">{{ this.gameweek.highest_scoring_player.player_name }} ( {{ this.gameweek.highest_player_score }} )</p>
        </div>
        
        <div class="border-b-2 border-[#00ff85] p-1">
            <p class="font-bold">Most Captained Player</p>
            <p :id="generateMostCaptainedPlayerId()">{{ this.gameweek.most_captained_player.player_name }}</p>
        </div>
        
        <div class="border-b-2 border-[#00ff85] p-1">
            <p class="font-bold">Most Vice-Captained Player</p>
            <p :id="generateMostViceCaptainedPlayerId()">{{ this.gameweek.most_vice_captained_player.player_name }}</p>
        </div>

        <div class="p-1">    
            <p class="font-bold">Most Transferred-In Player</p>
            <p :id="generateMostTransferredInPlayerId()">{{ this.gameweek.most_transferred_in_player.player_name }}</p>
        </div> 

    </div>
</template>

<script>
    export default {

        props: ['gameweek', 'teams'],
        
        // data() {
        //     return {
        //         msp: mspId,
        //     }
        // },

        created() {
            
            // console.log(this.gameweek);
            // console.log(this.teams);
            // console.log(this.gameweek.most_selected_player.player_name)
                // this.generateMostSelectedPlayerId();
            
        },

        mounted() {

            this.addMostSelectedPlayerColour();

            this.addHighestScoringPlayerColour();

            this.addMostCaptainedPlayerColour();

            this.addMostViceCaptainedPlayerColour();

            this.addMostTransferredInPlayerColour();

        },

        methods: {
            //most selected
           generateMostSelectedPlayerId() {

               let mostSelected = this.gameweek.most_selected_player.category;
               let gameweek = this.gameweek.id;
               let mspId = mostSelected.concat(gameweek);

               return mspId;
           },

           addMostSelectedPlayerColour() {
               let identifier = this.generateMostSelectedPlayerId();
               
               let element = document.getElementById(identifier);
               
               let colourClass = this.gameweek.most_selected_player.player_team;
               element.classList.add(colourClass);
           },

            //highest scoring
           generateHighestScoringPlayerId() {

               let highestScoring = this.gameweek.highest_scoring_player.category;
               let gameweek = this.gameweek.id;
               let hspId = highestScoring.concat(gameweek);

               return hspId;
           },

           addHighestScoringPlayerColour() {
               let identifier = this.generateHighestScoringPlayerId();
               
               let element = document.getElementById(identifier);
               
               let colourClass = this.gameweek.highest_scoring_player.player_team;
               element.classList.add(colourClass);
           },

           //most captained
            generateMostCaptainedPlayerId() {

               let mostCaptained = this.gameweek.most_captained_player.category;
               let gameweek = this.gameweek.id;
               let mcpId = mostCaptained.concat(gameweek);

               return mcpId;
           },

           addMostCaptainedPlayerColour() {
               let identifier = this.generateMostCaptainedPlayerId();
               
               let element = document.getElementById(identifier);
           
               let colourClass = this.gameweek.most_captained_player.player_team;
               element.classList.add(colourClass);
           },

           //most vice captained
            generateMostViceCaptainedPlayerId() {

               let mostViceCaptained = this.gameweek.most_vice_captained_player.category;
               let gameweek = this.gameweek.id;
               let mvcpId = mostViceCaptained.concat(gameweek);

               return mvcpId;
           },

           addMostViceCaptainedPlayerColour() {
               let identifier = this.generateMostViceCaptainedPlayerId();
               
               let element = document.getElementById(identifier);
               
               let colourClass = this.gameweek.most_vice_captained_player.player_team;
               element.classList.add(colourClass);
           },

           //most transferred in 
            generateMostTransferredInPlayerId() {

               let mostTransferredIn = this.gameweek.most_transferred_in_player.category;
               let gameweek = this.gameweek.id;
               let mtipId = mostTransferredIn.concat(gameweek);
            
               return mtipId;
           },

           addMostTransferredInPlayerColour() {
               let identifier = this.generateMostTransferredInPlayerId();
               
               let element = document.getElementById(identifier);
               
               let colourClass = this.gameweek.most_transferred_in_player.player_team;
               element.classList.add(colourClass);
           },
        },
    }
</script>

<style scoped>
    .ARS {
        background-color: #EF0107;
        color: white;
    }

    .AVL {
        background-color: #95BFE5;
        color: #670E36;
    }

    .BRE {
        background-color: red;
        color: white;
    }

    .BHA {
        background-color: #0057B8;
        color: white;
    }

    .BUR {
        background-color: #6C1D45;
        color: #99D6EA;
    }

    .CHE {
        background-color: #034694;
        color: white;
    }

    .CRY {
        background-color: #1B458F;
        color: #C4122E;
    }

    .EVE {
        background-color: #003399;
        color: white;
    }

    .LEI {
        background-color: #003090;
        color: #FDBE11;
    }

    .LEE {
        background-color: #FFCD00;
        color: white;
    }

    .LIV {
        background-color: #C8102E;
        color: white;
    }

    .MCI {
        background-color: #6CABDD;
        color: white;
    }

    .MUN {
        background-color: #DA291C;
        color: black;
    }

    .NEW {
        background-color: black;
        color: white;
    }

    .NOR {
        background-color: #00A650;
        color: #FFF200;
    }

    .SOU {
        background-color: #D71920;
        color: white;
    }

    .TOT {
        background-color: white;
        color: #132257;
    }

    .WAT {
        background-color: #FBEE23;
        color: #ED2127;
    }

    .WHU {
        background-color: #1BB1E7;
        color: #7A263A;
    }

    .WOL {
        background-color: #FDB913;
        color: black;
    }
</style>