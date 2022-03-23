<template>
    <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[270px]">
        <a href="team"><p>{{ this.team.team_name }}</p></a>
        {{ this.team }}
        <player></player>
    </div>
</template>

<script>
    export default {

        props: ['team'],

        mounted() {
            
            console.log(this.team);
        }
    }
</script>