<template>
    <app-layout>

        <template #header>
            Nos Formations
        </template>


    <div class="py-4">

        <div v-if="$page.flash" class="bg-green-500 text-white text-center">{{ $page.flash }}</div>

        <div class="mx-8 rounded shadow-lg px-2  py-4" v-for="course in this.ListCourses" :key="course.id">
             <span class="m-0 text-sm underline font-bold text-pink-400">Posted by: {{ course.user.name }}</span>
             <span class="text-pink-500 font-bold text-sm ml-6">{{ course.participants_on_the_course_via_episode  }} participant</span>
             <span v-if="parseInt(course.participants_on_the_course_via_episode ) > 1" class="text-pink-500 font-bold text-sm">s</span>
            <div class="flex justify-between items-center">

               <div class="flex justify-between items-center">
                    <div class="text-xl">{{ course.title.substring(0, 34) }}...</div>

               </div>
                <div class="text-sm text-gray-500">{{ course.episodes_count }} episodes</div>
            </div>

            <div>{{ course.description.substring(0, 150)}} ...</div>

            <div class="flex justify-between items-center">
                 <Link :href="'/course/' + course.id" class="rounded text-white px-2 py-1 text-xl bg-indigo-400 hover:bg-indigo-800 inline-block mt-3">Voir le cours</Link>
                 <Link :href="'/course/edit/' + course.id" class="rounded text-white px-2 py-1 text-xl bg-gray-600 hover:bg-black inline-block mt-3">Editer mon cours</Link>

                 <span class="text-sm font-bold text-indigo-400">{{ course.created_at }}</span>

            </div>

        </div>
    </div>


    </app-layout>
</template>

<script>

import AppLayout from "../../Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {

    data() {
        return {

            ListCourses: this.courses

        }
    },

    props: {
        courses: Array, flash: String,

    },

    components: {
        AppLayout, Link
    }


}
</script>
