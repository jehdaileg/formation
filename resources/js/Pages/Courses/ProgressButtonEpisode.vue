<template>
    <div>

        <button @click="toggleProgressButtonEpisodeVue()" class="p-2 ml-4 px-2 py-2 rounded bg-green-500 shadow-lg text-white">{{ this.isWatched ? 'Done Already !' : 'Termine ?' }}</button>

    </div>
</template>

<script>

export default{


data() {
    return {
        wathedEpisodesArray: this.watchedEpisodes,
        isWatched: null,
    }
},

props: {
    episodeId: String,
    watchedEpisodes: Array,

},
methods: {
    toggleProgressButtonEpisodeVue()
{
    //alert(props.episodeId)
   axios
     .post('/toggleProgressButtonEpisodeVueServerSide', {

         episodeId: this.episodeId,

     })
     .then(response => {

         if(response.status === 200)
         {
             this.isWatched = !this.isWatched
         }
     })
     .catch(error => console.log(error))
},

    isWatchedEpisodesTheSame()
    {
        return this.watchedEpisodes.find(episode => episode.id === this.episodeId) ? true: false
    }


},
    mounted()
    {
        //console.log(this.wathedEpisodesArray)

        this.isWatched = this.isWatchedEpisodesTheSame()
    }

}
/*
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

*/


</script>
