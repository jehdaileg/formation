<template>
    <app-layout>
        <template #header>
           <div>{{ course.title }}</div>
        </template>

        <div class="py-4 mx-8 ">

            <div class="text-xl text-indigo-300 px-1 py-1">{{ this.courseShow.episodes[this.defaultEpisodeIndex].title }}</div>

                <iframe :src="this.courseShow.episodes[this.defaultEpisodeIndex].video_url" :title="this.courseShow.episodes[this.defaultEpisodeIndex].title" class="mt-2 mb-2 w-full h-screen" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="">{{ this.courseShow.episodes[this.defaultEpisodeIndex].description.substring(0, 50) }} ...</div>

                <div class="mt-2 progression_bar">
                    <ProgressionBarPourcentageVue :episodesAllForTheCourse="this.courseShow.episodes" :episodesWatchedByAuthUser="watchedArrayEpisodesByAuthUser" />
                </div>

                <div class="mt-6">
                    <div class="text-blue-500">Autres Episodes:</div>
                    <ul v-for="(episode, index) in this.courseShow.episodes" :key="episode.id">
                        <div class="flex justify-between items-center">
                            <li>{{ episode.title }} </li>
                            <span></span>

                            <div class="flex justify-between items-center">
                                 <button @click="switchToThisEpisodeAndWatchIt(index)" class="rounded-lg mt-1 p-3 bg-slate-500 text-white inline-block">Voir Episode {{ index + 1 }}</button>

                                <ProgressButtonEpisodeVue :episodeId="episode.id" :watchedEpisodes="watchedArrayEpisodesByAuthUser"/>
                            </div>

                        </div>
                    </ul>

                </div>

        </div>

    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import ProgressButtonEpisodeVue from "./ProgressButtonEpisode.vue";
import ProgressionBarPourcentageVue from "./ProgressionBarPourcentage.vue";

export default {
    data() {
        return {

            courseShow: this.course,
            defaultEpisodeIndex: 0,
        }
    },

    props: {
        course: {
            type: Array
        },

        episodeId: {
            type: String,
        },

        watchedArrayEpisodesByAuthUser: {
            type: Array,
        },
    },

    components: {
        AppLayout, ProgressButtonEpisodeVue,ProgressionBarPourcentageVue,
    },

    methods: {
        switchToThisEpisodeAndWatchIt(index){

            this.defaultEpisodeIndex = index;

            window.scroll({

                top: 0,
                left: 0,
                behavior: 'smooth'

            });
        }

    },
}

</script>
