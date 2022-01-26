<template>
    <div>
        <div class="bg-gray-200 w-full rounded-lg">
            <div class="text-white bg-green-500 rounded-l" :style="'width:' +percentage+ '%;'">{{ percentage }} %</div>
        </div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            epCourse: this.episodesAllForTheCourse,
            epWatchedByUser: this.episodesWatchedByAuthUser,
        }
    },

    computed: {

        percentage()
        {
           let FilterEpisodes = this.epCourse.filter(courseEp => {

               return this.epWatchedByUser.find(watchedEp => {

                   return watchedEp.id === courseEp.id

               });

           });

           return Math.ceil(FilterEpisodes.length/this.epCourse.length * 100);
        }
    },

    props: {
        episodesAllForTheCourse: Array,
        episodesWatchedByAuthUser: Array
    },

    mounted() {
        //console.log(this.epCourse, this.epWatchedByUser)
    },

}
</script>
