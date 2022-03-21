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
            <p class="font-bold">Highest Scoring Player (score)</p>
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

        props: ['gameweek'],

        created() {
            
            console.log(this.gameweek);
            
        },

        methods: {

           
        }
    }
</script>

<style scoped>
    .arsenal {

    }

    .aston-villa {

    }

    .brentford {

    }

    .brighton {

    }

    .burnley {

    }

    .chelsea {

    }

    .crystal-palace {

    }

    .everton {

    }

    .leicester {

    }

    .leeds {

    }

    .liverpool {
        background-color: red;
        color: yellow;
    }

    .man-city {

    }

    .man-united {

    }

    .newcastle {

    }

    .norwich {

    }

    .southampton {

    }

    .spurs {

    }

    .watford {

    }

    .wolves {

    }
</style>