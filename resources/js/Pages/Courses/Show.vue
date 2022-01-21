<template>
    <app-layout>
        <template #header>
           <div>{{ course.title }}</div>
        </template>

        <div class="py-4 mx-8 ">

            <div class="text-xl text-indigo-300 px-1 py-1">{{ course.episodes[this.defaultEpisodeIndex].title }}</div>

                <iframe :src="course.episodes[this.defaultEpisodeIndex].video_url" :title="course.episodes[this.defaultEpisodeIndex].title" class="mt-2 mb-2 w-full h-screen" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="">{{ course.episodes[this.defaultEpisodeIndex].description.substring(0, 50) }} ...</div>

                <div class="mt-6">
                    <div class="text-blue-500">Autres Episodes:</div>
                    <ul v-for="(episode, index) in this.course.episodes" :key="episode.id">
                        <div class="flex justify-between items-center">
                            <li>{{ episode.title }} </li>
                            <span></span>
                            <button @click="switchToThisEpisodeAndWatchIt(index)" class="rounded-lg mt-1 p-3 bg-slate-500 text-white inline-block">Voir Episode {{ index + 1 }}</button>
                        </div>
                    </ul>

                </div>

        </div>

    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
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
    },

    components: {
        AppLayout
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
