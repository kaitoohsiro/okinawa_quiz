<template>
    <div class="editQuiz">
        <sideBar />
        <div class="editMain">
            <h1>Edit Quiz</h1>
            <form class="editForm">
                <label>
                    <span class="text">問題文を入力</span>
                    <textarea v-model="editData.question" v-bind:placeholder="orderData.question"></textarea>
                </label>
                <label>
                    <span class="text">カテゴリー：</span>
                    <select v-model="selectCategory " @change="checkCategory">
                        <option v-for="categoryName in category">
                            {{ categoryName.category }}
                        </option>
                    </select>
                </label>
                <label>
                    <span class="text">選択肢1: </span>
                    <input type="text" v-model="editData.choice1" placeholder="選択肢1) 鹿児島" v-bind:placeholder="orderData.choice1">
                </label>
                <label>
                    <span class="text">選択肢2: </span>
                    <input type="text" v-model="editData.choice2"  placeholder="選択肢2) 東京" v-bind:placeholder="orderData.choice2">
                </label>
                <label>
                    <span class="text">正解選択肢: </span>
                    <input type="text" v-model="editData.correct" placeholder="答え) 沖縄" v-bind:placeholder="orderData.correct">
                </label>
                <label>
                    <span class="text">画像: </span>
                    <!--                <input type="file" v-model="image">-->
                </label>
                <label>
                    <span class="text">解説: </span>
                    <textarea v-model="editData.explain_sentence" v-bind:placeholder="orderData.explain_sentence"></textarea>
                </label>

                <button class="button" @click="onSubmit()">変更する</button>
            </form>
            <div class="historyFlex">
                <div class="history">
                    <p>変更前</p>
                    <p>{{ orderData.question }}</p>
                    <p>{{ orderData.correct }}</p>
                    <p>{{ orderData.choice1 }}</p>
                    <p>{{ orderData.choice2 }}</p>
                    <p>{{ orderData.explain_sentence }}</p>
                    <p class="imgEdit" v-if="orderData.image_name">{{ orderData.image_name }}</p>
                    <p v-else>null</p>
                    <p>{{ orderData.category_id }}</p>
                </div>
                <div class="history">
                    <p>変更後</p>
                    <p>{{ editData.question }}</p>
                    <p>{{ editData.correct }}</p>
                    <p>{{ editData.choice1 }}</p>
                    <p>{{ editData.choice2 }}</p>
                    <p>{{ editData.explain_sentence }}</p>
                    <p class="imgEdit" v-if="editData.image_name">{{ editData.image_name }}</p>
                    <p v-else>null</p>
                    <p>{{ editData.category_id }}</p>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
    import sideBar from '../../../components/admin/sideBar/side'
    export default {
        components: {
            sideBar,
        },
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
    .editQuiz {
        display: flex;
        height: 100vh;
        background-color: #cecdcd;
    }
    .editMain {
        padding: 10px 10px 10px 30px;
        flex: 1;
        overflow-y: scroll;
    }
    .editForm {
        display: flex;
        flex-direction: column;
    }
    .button {
        font-size: 20%;
    }
    label {
        margin: 5px;
    }
    textarea {
        width: 70%;
        height: 100px;
        border-radius: 30px;
        padding: 10px 20px;
    }
    .img {
        width: 500px;
    }
    .text {
        font-weight: bold;
    }
    .historyFlex {
        display: flex;
        background-color: antiquewhite;
        padding: 20px;
        border-radius: 10px;
        margin: 10px;
    }
    .history {
        margin: auto;
        width: 40%;
    }
    .history p {
        border-bottom: 1px solid #000000;
    }
    .imgEdit {
        height: 50px;
        overflow-x: scroll;
    }
</style>
