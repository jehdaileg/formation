<template>
    <AppLayoutVue>
        <template #header>
            <div class="flex space-x-2">
                <Link :href="route('dashboard')"
                    ><span class="px-2 py-2 p-4" :style="'padding:20px;'"
                        >&larr;</span
                    ></Link
                >
                <h5 class="text-black font-bold">Modification du cours {{ course.title.substring(0, 15)}} </h5>
            </div>
        </template>

        <div class="w-full mt-3 max-w-lg mx-20">
            <form
                @submit.prevent="updateFormation"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            >
                <div class="mb-4">
                    <label
                        class="block text-gray-700 text-sm font-bold mb-2"
                        for="title"
                    >
                        Title
                    </label>
                    <input
                        v-model="course.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username"
                        type="text"
                        placeholder="Username"
                    />

                </div>
                <div class="mb-4">
                    <label
                        for="description"
                        class="form-label inline-block mb-2 text-gray-700"
                        >Description</label
                    >
                    <textarea
                        v-model="course.description"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:text-gray-700 focus:outline-none focus:border-blue-600 focus:bg-white"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        placeholder="Description..."
                    ></textarea>

                </div>

                <div class="episodes mt-2">
                    <h5 class="font-bold">
                        Ajouter des episodes pour la formation
                    </h5>

                    <div
                        v-for="(episode, index) in course.episodes"
                        :key="index"
                        class="mt-2"
                    >
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                :for="index"
                            >
                                Title Episode {{ index + 1 }}
                            </label>
                            <input
                                v-model="course.episodes[index].title"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                :id="'title-' + index"
                                type="text"
                                placeholder="Tap title..."
                            />

                        </div>

                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                :for="index"
                            >
                                Video Episode {{ index + 1 }}
                            </label>
                            <input
                                v-model="course.episodes[index].video_url"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                :id="'video_url-' + index"
                                type="text"
                                placeholder="Tap Video..."
                            />

                        </div>

                        <div class="mb-4">
                            <label
                                :for="index"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Description Eisode {{ index + 1 }}</label
                            >
                            <textarea
                                v-model="course.episodes[index].description"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:text-gray-700 focus:outline-none focus:border-blue-600 focus:bg-white"
                                :id="'description-' + index"
                                rows="3"
                                placeholder="Description..."
                            ></textarea>

                        </div>
                    </div>
                </div>

                <div class="flex justify-start mt-2">
                    <button
                        v-if="course.episodes.length < 15"
                        @click.prevent="addFormEpisode"
                        class="rounded-lg px-2 py-2 bg-green-500 text-white text-center"
                    >
                        +
                    </button>
                    <button
                        v-if="course.episodes.length > 1"
                        @click.prevent="removeFormEpisode"
                        class="rounded-lg px-2 py-2 bg-red-500 text-white text-center ml-4"
                    >
                        --
                    </button>
                </div>

                <div class="flex items-center justify-between mt-2">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Poster la formation
                    </button>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2022 Jehdaidev. All rights reserved.
            </p>
        </div>
    </AppLayoutVue>
</template>

<script>
import AppLayoutVue from "../../Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AppLayoutVue,
        Link,
    },

   props: ['course'],

    data() {
        return {

        };
    },

    mounted(){
        console.log(this.course)
    },

    methods: {
        updateFormation() {
            this.$inertia.patch('/course/' +this.course.id, this.course,{
                preserveState: true,
                onStart: () => {
                    console.log('starting edit request');
                },

                onFinish: () => {
                    console.log('Finish edit request');
                }
            });

        },

        addFormEpisode() {
            this.course.episodes.push({
                title: null,
                description: null,
                video_url: null,
            });

            document.body.scrollTop = document.body.scrollHeight;
        },

        removeFormEpisode() {
            this.course.episodes.pop();
        },
    },

    updated() {
        window.scrollBy({
            left: 0,
            behavior: "smooth",
        });
    },
};
</script>
