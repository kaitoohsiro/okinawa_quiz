<template>
    <div>
        <h1>Quiz</h1>
        <form>
            <label> 問題文を入力
                <textarea v-model="quiz" placeholder="問題を入力"></textarea>
            </label>
            <label>
                <select v-model="selectCategory " @change="checkCategory">
                    <option v-for="categoryName in category">
                        {{ categoryName.category }}
                    </option>
                </select>
            </label>
            <label>
                <input type="text" v-model="choice1" placeholder="選択肢1) 鹿児島">
            </label>
            <label>
                <input type="text" v-model="choice2" placeholder="選択肢2) 東京">
            </label>
            <label>
                <input type="text" v-model="answer" placeholder="答え) 沖縄">
            </label>
            <label>
                <input type="file" >
            </label>
            <label>
                <textarea v-model="explainSentence" placeholder="解説"></textarea>
            </label>

            <button class="button" @click="onSubmit()">送信する</button>
        </form>
        {{ categoryId }}
    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                quiz: null,
                categoryId: null,
                selectCategory: '',
                selectCategoryName: null,
                categoryCount: 0,
                category: null,
                choice1: null,
                choice2: null,
                answer: null,
                image: null,
                explainSentence: null,
                params: null
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
            checkCategory: function()
            {
                for (let i = 0; i < this.categoryCount; i++) {
                    if (this.category[i].category === this.selectCategory) {
                        this.categoryId = this.category[i].id;
                    }
                }
            },
            onSubmit: function() {
                this.params = {
                    quiz: this.quiz,
                    categoryId: this.categoryId,
                    choice1: this.choice1,
                    choice2: this.choice2,
                    answer: this.answer,
                    explainSentence: this.explainSentence,
                    // image: this.image
                };
                console.log(this.params);
                axios.post('/api/admin/quiz/create', this.params)
            }
        }
    }
</script>

<style scoped>
    .button {
        font-size: 20%;
    }
</style>
