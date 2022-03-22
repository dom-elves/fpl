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
            <p>{{ this.gameweek.most_selected_player }}</p>
        </div>

        <div class="border-b-2 border-[#00ff85] p-1">       
            <p class="font-bold">Highest Scoring Player </p>
            <p>{{ this.gameweek.highest_scoring_player }} ( {{ this.gameweek.highest_player_score }} )</p>
        </div>
        
        <div class="border-b-2 border-[#00ff85] p-1">
            <p class="font-bold">Most Captained Player</p>
            <p>{{ this.gameweek.most_captained_player }}</p>
        </div>
        
        <div class="border-b-2 border-[#00ff85] p-1">
            <p class="font-bold">Most Vice-Captained Player</p>
            <p>{{ this.gameweek.most_vice_captained_player }}</p>
        </div>

        <div class="p-1">    
            <p class="font-bold">Most Transferred-In Player</p>
            <p>{{ this.gameweek.most_transferred_in_player }}</p>
        </div> 

    </div>
</template>

<script>
    export default {

        props: ['gameweek', 'teams'],
            

        created() {
            
            console.log(this.gameweek);
            console.log(this.teams);
        },

        methods: {

           
        }
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