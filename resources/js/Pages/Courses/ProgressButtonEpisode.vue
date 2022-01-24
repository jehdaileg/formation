<template>
    <div>

        <button @click="toggleProgressButtonEpisodeVue()" class="p-2 ml-4 px-2 py-2 rounded bg-green-500 shadow-lg text-white">Termine ??</button>

    </div>
</template>

<script setup>
import axios from "axios";


const props = defineProps({
    episodeId: '',
});

function toggleProgressButtonEpisodeVue()
{
    //alert(props.episodeId)
   axios
     .post('/toggleProgressButtonEpisodeVueServerSide', {

         episodeId: props.episodeId,

     })
     .then(response => console.log(response))
     .catch(error => console.log(error))
}


</script>
