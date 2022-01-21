<template>
    <app-layout>

        <template #header>
            Nos Formations
        </template>


    <div class="py-4">

        <div class="ml-5 rounded shadow-lg px-2  py-4" v-for="course in this.ListCourses" :key="course.id">
            <div class="flex justify-between items-center">
                <div class="text-xl">{{ course.title }}</div>
                <div class="text-sm text-gray-500">25 episodes</div>
            </div>

            <div>{{ course.description }}</div>
            <a href="#" class="rounded text-white px-2 py-1 text-xl bg-indigo-400 hover:bg-indigo-800 inline-block mt-3">Voir le cours</a>

        </div>
    </div>


    </app-layout>
</template>

<script>

import AppLayout from "../../Layouts/AppLayout.vue";
export default {

    data() {
        return {

            ListCourses: this.courses

        }
    },

    props: {
        courses: Array,

    },

    components: {
        AppLayout
    }


}
</script>
