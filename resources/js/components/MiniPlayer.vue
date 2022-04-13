<template>

    <div class="text-center border-2 border-[#00ff85] m-2 bg-purple-50 w-[150px]">

        <p> player information placeholder </p>

        <v-select :options="[{label: 'Canada', code: 'ca'}]"></v-select>

    </div>

</template>




<script>

import Vue from "vue";
import vSelect from "vue-select";

export default {

    name: 'MiniPlayer',
}
</script>
