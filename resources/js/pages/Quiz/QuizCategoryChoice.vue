<template>
    <div class="category">
        <h1>カテゴリーを選んでね。</h1>
        <div class="choice">
            <span>
                <RouterLink :to="{name: 'quiz', params: {value: ''}}">全て</RouterLink>
            </span>
        </div>
        <div class="choice" v-for='item in category'>
            <span>
                <RouterLink :to="{name: 'quiz', params: {value: item.id}}">{{ item.category }}</RouterLink>
            </span>
        </div>
        <img src="./../../../images/sisa1.png">
    </div>
</template>


<script>

export default {
    data: function() {
        return {
            category: null,
            selectCategory: '',
        }
    },
    created() {
        this.getCategory();
    },
    methods: {
        getCategory: function () {
            axios
                .get('/api/admin/quiz/create')
                .then(response => {
                    this.category = response.data;
                    this.categoryCount = this.category.length;
                });
        },
    }

}
</script>

<style scoped>
.category {
    padding-top: 10%;
    text-align: center;
}
a {
    text-decoration: none;
    color: rgb(3, 3, 3);
    padding: 3% 40%;
}
.choice {
    margin: 20px auto;
    background:rgb(112, 210, 248);
    border-radius: 10px;
    width: 60%;
}
img {
    width: 20vw;
}

@media screen and (max-width: 1024px) {
    .category {
        padding-top: 20%;
    }
    img {
        width: 40vw;
    }
}
@media screen and (max-width: 1024px) {
    img {
        width: 70vw;
    }
}
</style>


