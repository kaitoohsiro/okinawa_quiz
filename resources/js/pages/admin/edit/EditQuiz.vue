<template>
    <div class="edit_quiz">
        <h1>Edit Quiz</h1>
        <form>
            <label> 問題文を入力
                <textarea v-model="editData.question" v-bind:placeholder="orderData.question"></textarea>
            </label>
            <label>
                <select v-model="selectCategory " @change="checkCategory">
                    <option v-for="categoryName in category">
                        {{ categoryName.category }}
                    </option>
                </select>
            </label>
            <label>
                <input type="text" v-model="editData.choice1" placeholder="選択肢1) 鹿児島" v-bind:placeholder="orderData.choice1">
            </label>
            <label>
                <input type="text" v-model="editData.choice2"  placeholder="選択肢2) 東京" v-bind:placeholder="orderData.choice2">
            </label>
            <label>
                <input type="text" v-model="editData.correct" placeholder="答え) 沖縄" v-bind:placeholder="orderData.correct">
            </label>
            <label>
                <!--                <input type="file" v-model="image">-->
            </label>
            <label>
                <textarea v-model="editData.explain_sentence" v-bind:placeholder="orderData.explain_sentence"></textarea>
            </label>

            <button class="button" @click="onSubmit()">変更する</button>
        </form>
        {{ editData }}
        {{ orderData }}
    </div>

</template>


<script>

export default {
    data: function() {
        return {
            category: null,
            orderData: null,
            selectCategory: '',
            editData: {
                id: null,
                question: null,
                correct: null,
                choice1: null,
                choice2: null,
                explain_sentence: null,
                image_name: null,
                category_id: null
            }
            // choice1:
        }
    },
    created() {
        this.getCategory();
        this.getDataQuiz();
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
        getDataQuiz: function() {
            this.orderData = this.$router.currentRoute.params.list;
            this.editData = {
                id: this.orderData.id,
                question: this.orderData.question,
                correct: this.orderData.correct,
                choice1: this.orderData.choice1,
                choice2: this.orderData.choice2,
                explain_sentence: this.orderData.explain_sentence,
                image_name: this.orderData.image_name,
                category_id: this.orderData.category_id
            };
        },
        checkCategory: function() {
            for (let i = 0; i < this.categoryCount; i++) {
                if (this.category[i].category === this.selectCategory) {
                    this.editData.category_id = this.category[i].id;
                }
            }
        },
        onSubmit: function () {
            axios.post('/api/admin/quiz/edit', this.editData)
        }
    },

}
</script>

<style scoped>
    .button {
        font-size: 20%;
    }
</style>
